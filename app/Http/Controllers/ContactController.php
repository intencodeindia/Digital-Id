<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\GeneralHtmlEmail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'user_id' => 'nullable',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Store the contact form data
        Contact::create($validated);

        // Prepare the email content
        $subject = "Contact Form Submitted";
        $content = "<strong>Hello User,</strong><br>Your contact form has been submitted successfully. This is an example of an HTML email.";

        // Send email to the person who submitted the contact form (the user)
        Mail::to($request->email)->send(new GeneralHtmlEmail($subject, $content));

        // Send email to the admin or recipient (support or business)
        $adminSubject = "New Contact Form Submission";
        $adminContent = "
            <table style='width: 100%; border: 1px solid #ddd; border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th style='padding: 8px; text-align: left; background-color: #f4f4f4;'>Field</th>
                        <th style='padding: 8px; text-align: left; background-color: #f4f4f4;'>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style='padding: 8px; border: 1px solid #ddd;'>Name</td>
                        <td style='padding: 8px; border: 1px solid #ddd;'>{$request->name}</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px; border: 1px solid #ddd;'>Email</td>
                        <td style='padding: 8px; border: 1px solid #ddd;'>{$request->email}</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px; border: 1px solid #ddd;'>Subject</td>
                        <td style='padding: 8px; border: 1px solid #ddd;'>{$request->subject}</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px; border: 1px solid #ddd;'>Message</td>
                        <td style='padding: 8px; border: 1px solid #ddd;'>" . nl2br($request->message) . "</td>
                    </tr>
                </tbody>
            </table>
        ";
        
        Mail::to('skhobragade993@gmail.com')->send(new GeneralHtmlEmail($adminSubject, $adminContent)); // Replace with the actual recipient email

        // Flash message for the user
        session()->flash('contact_message', 'Contact submitted successfully!');

        // Redirect to the profile page
        return redirect()->route('public.profile', ['username' => $request->username]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
