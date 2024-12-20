<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Helpers\TwoFactorAuthentication;
use Illuminate\Support\Facades\Mail;
use App\Mail\GeneralHtmlEmail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'No account found with this email.'
            ], 422);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid password.'
            ], 422);
        }

        if ($user->two_factor_authentication) {
            $otp = TwoFactorAuthentication::generateOTP();
            Session::put('otp', $otp);
            Session::put('user_id', $user->id);

            $subject = "Your Two-Factor Authentication OTP";
            $content = "
                <strong>Hello {$user->username},</strong><br>
                We received a request to enable two-factor authentication on your Proffid account. To verify your identity, please use the following one-time password (OTP):<br><br>
                <p style='font-size: 18px;'>
                    <strong>OTP: </strong>
                    <span style='font-size: 24px; font-weight: bold; color: #007bff; padding: 10px; background-color: #f0f0f0; border-radius: 5px; border: 1px solid #ccc;'>{$otp}</span>
                </p>
                This OTP is valid for 10 minutes and can only be used once.<br><br>
                <strong>Important:</strong><br>
                If you did not request this action, please change your password immediately.<br><br>
                Thank you for using Proffid!<br>
                Best regards,<br>The Proffid Team";

            Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));

            return response()->json([
                'status' => 'success',
                'message' => 'OTP sent to email',
                'requires_2fa' => true
            ]);
        }

        Auth::login($user);
        $token = $user->createToken('authToken')->plainTextToken;

        Session::put([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'digital_id' => $user->digital_id,
            'relationship' => $user->relationship,
            'parent_id' => $user->parent_id,
        ]);

        $deviceDetails = strpos($request->header('User-Agent'), 'Mobile') !== false ? 'Mobile Device' : 'Desktop Device';

        $subject = "New Device Login - Important Security Alert";
        $content = "
            <strong>Hello {$user->username},</strong><br><br>
            We detected a login to your Proffid account from a new device. Below are the details of the device and location where the login occurred:<br><br>
            <strong>Device:</strong> {$deviceDetails}<br>
            If you did not log in from this device, please take immediate action to secure your account:<br>
            1. Change your password immediately.<br>
            2. Contact our support team if you have any concerns or questions at <a href='mailto:support@proffid.com'>support@proffid.com</a>.<br><br>
            Thank you for using Proffid!<br>
            Best regards,<br>
            The Proffid Team";
        Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));

        $user->profile_photo = $user->profile_photo ? url('uploads/avatars/' . $user->profile_photo) : null;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout successful']);
    }

    public function verifyOTP(Request $request)
    {
        $otp = $request->input('otp');
        $user_id = $request->input('user_id');
        $storedOTP = Session::get('otp');
        $user = User::find($user_id);

        $subject = "OTP Verification Successful";
        $content = "
            <strong>Hello {$user->username},</strong><br>
            Your OTP has been verified successfully. You can now proceed to log in to your account.<br><br>
            Thank you for using Proffid!<br>
            Best regards,<br>
            The Proffid Team";

        Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));

        if ($otp === $storedOTP) {
            return response()->json(['message' => 'OTP verified successfully']);
        }
    }

    public function resendOTP(Request $request)
    {
        $user_id = $request->input('user_id');
        $otp = TwoFactorAuthentication::generateOTP();
        Session::put('otp', $otp);
        $user = User::find($user_id);
        $subject = "Your Two-Factor Authentication OTP";
        $content = "
            <strong>Hello {$user->username},</strong><br>
            We received a request to enable two-factor authentication on your Proffid account. To verify your identity, please use the following one-time password (OTP):<br><br>
            <p style='font-size: 18px;'>
                <strong>OTP: </strong>
                <span style='font-size: 24px; font-weight: bold; color: #007bff; padding: 10px; background-color: #f0f0f0; border-radius: 5px; border: 1px solid #ccc;'>{$otp}</span>
            </p>";

        Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));

        return response()->json(['message' => 'OTP resent successfully']);
    }

    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }
}
