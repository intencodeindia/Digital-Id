<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VcardDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\GeneralHtmlEmail;
use Illuminate\Support\Facades\Mail;
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

        $verifiedLink = $this->generateEmailVerificationLink();

        try {
            // Create user using validated data
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
            // Return back with error message if something goes wrong
            return back()->withInput()->withErrors('An error occurred during registration. Please try again.');
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
}
