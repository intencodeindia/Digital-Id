<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Helpers\TwoFactorAuthentication;  // A helper class for generating and verifying OTP (you need to implement this)
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\GeneralHtmlEmail;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = User::where('email', $credentials['email'])->first();

        // Check if the user exists
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'No account found with this email.'
            ], 422);
        }

        // Check if the password is correct
        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid password.'
            ], 422);
        }

        // Check if the user has two-factor authentication enabled
        if ($user->two_factor_authentication) {
            // Generate and store a 6-digit PIN in the session for OTP verification
            $otp = TwoFactorAuthentication::generateOTP();
            Session::put('otp', $otp);
            Session::put('user_id', $user->id);

            // Subject of the email
            $subject = "Your Two-Factor Authentication OTP";

            // Dynamic content for the email body
            $content = "
   <strong>Hello {$user->username},</strong><br>
   We received a request to enable two-factor authentication on your Proffid account. To verify your identity, please use the following one-time password (OTP):<br><br>

   <p style='font-size: 18px;'>
                <strong>OTP: </strong>
                <span style='font-size: 24px; font-weight: bold; color: #007bff; padding: 10px; background-color: #f0f0f0; border-radius: 5px; border: 1px solid #ccc;'>{$otp}</span>
            </p>

   This OTP is valid for 10 minutes and can only be used once. Please enter it on the verification page to complete the process.<br><br>

   <strong>Important:</strong><br>
   If you did not request this action, please change your password immediately.<br><br>

   Thank you for using Proffid!<br>
   Best regards,<br>The Proffid Team
   ";

            // Send the email using the GeneralHtmlEmail Mailable
            Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));


            // Redirect to the verification page
            return response()->json([
                'status' => 'success',
                'redirect' => '/two-factor-authentication-code'
            ]);
        }

        // If no 2FA is enabled, log the user in directly
        Auth::login($user);
        $request->session()->regenerate();

        // Store user info in session
        Session::put([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'digital_id' => $user->digital_id,
            'relationship' => $user->relationship,
            'parent_id' => $user->parent_id,
        ]);

        // Get device details (simplified to mobile or desktop detection)
        $userAgent = $request->header('User-Agent');
        if (strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'Android') !== false) {
            $deviceDetails = 'Mobile Device';
        } else {
            $deviceDetails = 'Desktop Device';
        }



        // Subject of the email
        $subject = "New Device Login - Important Security Alert";

        // Dynamic content for the email body
        $content = "
                <strong>Hello {$user->username},</strong><br><br>

                We detected a login to your Proffid account from a new device. Below are the details of the device and location where the login occurred:<br><br>

                <strong>Device:</strong> {$deviceDetails}<br>
                If you did not log in from this device, please take immediate action to secure your account:<br>
                1. Change your password immediately.<br>
                2. Contact our support team if you have any concerns or questions at <a href='mailto:support@proffid.com'>support@proffid.com</a>.<br><br>

                Thank you for using Proffid!<br>
                Best regards,<br>
                The Proffid Team
                ";


        // Send the email using the GeneralHtmlEmail Mailable
        Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));
        // Get the redirect URL based on role
        $redirectUrl = match ($user->role) {
            'admin' => '/home',
            'organization' => '/home',
            'employee' => '/home',
            'familymember' => '/home',
            default => '/home',
        };

        return response()->json([
            'status' => 'success',
            'redirect' => $redirectUrl
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Method to show the OTP verification form
    public function showOtpVerificationForm()
    {
        return view('two-factor-authentication-verify');
    }

    // Method to handle OTP verification
    public function verifyOtp(Request $request)
    {
        // Validate the OTP input
        $request->validate([
            'otp' => 'required|numeric|digits:6', // Ensure it's a 6-digit numeric OTP
        ]);

        // Get the stored OTP from the session
        $otp = Session::get('otp');
        $userId = Session::get('user_id');

        // If OTP is correct, log the user in and redirect to home
        if ($request->otp == $otp) {
            $user = User::find($userId);

            // Login the user
            Auth::login($user);
            $request->session()->regenerate();

            // Store user info in session
            Session::put([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_role' => $user->role,
                'digital_id' => $user->digital_id,
                'relationship' => $user->relationship,
                'parent_id' => $user->parent_id,
            ]);


            // Get device details (simplified to mobile or desktop detection)
            $userAgent = $request->header('User-Agent');
            if (strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'Android') !== false) {
                $deviceDetails = 'Mobile Device';
            } else {
                $deviceDetails = 'Desktop Device';
            }



            // Subject of the email
            $subject = "New Device Login - Important Security Alert";

            // Dynamic content for the email body
            $content = "
                <strong>Hello {$user->username},</strong><br><br>

                We detected a login to your Proffid account from a new device. Below are the details of the device and location where the login occurred:<br><br>

                <strong>Device:</strong> {$deviceDetails}<br>
                <br>
                If you did not log in from this device, please take immediate action to secure your account:<br>
                1. Change your password immediately.<br>
                2. Contact our support team if you have any concerns or questions at <a href='mailto:support@proffid.com'>support@proffid.com</a>.<br><br>

                Thank you for using Proffid!<br>
                Best regards,<br>
                The Proffid Team
                ";


            // Send the email using the GeneralHtmlEmail Mailable
            Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));
            // Get the redirect URL based on role
            $redirectUrl = match ($user->role) {
                'admin' => '/home',
                'organization' => '/home',
                'employee' => '/home',
                'familymember' => '/home',
                default => '/home',
            };

            // Clear OTP from session and redirect to the user's home page
            Session::forget('otp');
            Session::forget('user_id');

            return redirect($redirectUrl)->with('otp_status', 'success')->with('message', 'OTP verified successfully');
        }

        // If OTP is incorrect, send an error message
        return redirect('/two-factor-authentication-code')->with('otp_status', 'error')->with('message', 'Invalid OTP. Please try again.');
    }
}
