<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VcardDetail;
use App\Models\CustomOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\GeneralHtmlEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'username' => 'required|string|unique:users',
            'phone' => 'nullable|string|max:20',
        ]);

        // Debugging: Check the validated data

        $verifiedLink = $this->generateEmailVerificationLink();

        try {
            // Check if the create is successful
            $user = User::create([
                'name' => $validated['first-name'] . ' ' . $validated['last-name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'username' => $validated['username'],
                'phone' => $validated['phone'] ?? null,
                'role' => 'user',  // Default role
                'digital_id' => $this->generateDigitalId(),
                'status' => true,   // Assuming the user is active by default
                'email_verified_link' => $verifiedLink,
            ]);

            // Debugging: Check the user object

            // Create a new VCard entry using Eloquent
            VcardDetail::create([
                'user_id' => $user->id,  // Store the user_id
            ]);

            // Prepare the email content
            $subject = "Email Verification";
            $content = "<strong>Hello User,</strong><br>Your registration has been submitted successfully. Your email verification link is $verifiedLink.";

            // Send email to the person who submitted the contact form (the user)
            Mail::to($request->email)->send(new GeneralHtmlEmail($subject, $content));

            return redirect()->route('login')->with('register_status', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            // Log the error and the exception
            Log::error('Registration Error: ', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            return back()->withInput()->withErrors('An error occurred during registration. Please try again.');
        }
    }


    public function organizationIndex()
    {
        return view('organization-register');
    }
    // Handle organization registration

    // Handle organization registration
    public function organizationRegister(Request $request)
    {
        // Log the incoming request for debugging
        Log::debug('Organization Register Form Submitted', $request->all());

        // Validate organization input
        $validated = $request->validate([
            'organization-name' => 'required|string|max:255',
            'organization-email' => 'required|email|unique:users,email', // Save in the same users table
            'organization-username' => 'required|string|unique:users,username',
            'organization-phone' => 'required|string|max:15',
            'organization-password' => 'required|string|min:8',
            'organization-confirm-password' => 'required|string|min:8|same:organization-password',
            'organization-toc' => 'required|accepted', // Ensure the user agrees to terms
        ]);

        // Check validation success and log
        Log::debug('Validation passed, proceeding with registration.');

        // Generate email verification link
        $verifiedLink = $this->generateEmailVerificationLink();

        try {
            // Create organization using validated data (store in the users table)
            $organization = User::create([
                'name' => $validated['organization-name'],
                'email' => $validated['organization-email'],
                'phone' => $validated['organization-phone'],
                'password' => Hash::make($validated['organization-password']),
                'username' => $validated['organization-username'],
                'role' => 'organization',  // Set the role to 'organization'
                'digital_id' => $this->generateDigitalId(),
                'status' => true,   // Assuming the organization is active by default
                'email_verified_link' => $verifiedLink,
            ]);

            // Create related Vcard and CustomOrganization
            VcardDetail::create([
                'user_id' => $organization->id,
            ]);

            CustomOrganization::create([
                'name' => $validated['organization-name'],
                'logo' => NULL,
                'address' => 'No address provided',
                'created_by' => $organization->id,
                'border_color_top' => NULL,
                'border_color_right' => NULL,
                'border_color_bottom' => NULL,
                'border_color_left' => NULL,
            ]);

            // Prepare email content for organization verification
            $subject = "Organization Registration Confirmation";
            $content = "<strong>Hello " . $validated['organization-name'] . ",</strong><br>Your organization registration has been submitted successfully. Your email verification link is $verifiedLink.";

            // Send email to the organization
            Mail::to($validated['organization-email'])->send(new GeneralHtmlEmail($subject, $content));

            return redirect()->route('organization.register')->with('success', 'Organization registered successfully! Please check your email to verify your organization.');
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Error during organization registration', ['error' => $e->getMessage()]);

            return back()->withInput()->withErrors('An error occurred during organization registration. Please try again.');
        }
    }


    // Function to generate a unique digital ID
    protected function generateDigitalId()
    {
        do {
            // Generate a random 12-digit number
            $digitalId = str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (User::where('digital_id', $digitalId)->exists()); // Ensure the digital ID is unique

        return $digitalId;
    }

    protected function generateEmailVerificationLink()
    {
        $randomString = Str::random(10);
        return url('/verify-email/verify/' . $randomString);
    }

    public function verifyEmail($token)
    {
        $token = url('/verify-email/verify/' . $token);
        $user = User::where('email_verified_link', $token)->first();
        // dd($user);
        if ($user) {
            $user->email_verified_link = null;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('home')->with('success', 'Email verified successfully!');
        } else {
            return redirect()->route('home')->with('error', 'Invalid verification link.');
        }
    }
}
