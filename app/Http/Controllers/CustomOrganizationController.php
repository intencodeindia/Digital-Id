<?php
// app/Http/Controllers/CustomOrganizationController.php

namespace App\Http\Controllers;

use App\Models\CustomOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomOrganizationController extends Controller
{
    // Display a listing of all organizations
    public function index()
    {
        $user = Auth::user();
        $organizations = CustomOrganization::where('created_by', $user->id)->get();
        return view('user.organizations', compact('organizations', 'user'));
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string',
            'border_color_top' => 'nullable|string',
            'border_color_right' => 'nullable|string',
            'border_color_bottom' => 'nullable|string',
            'border_color_left' => 'nullable|string',
        ]);

        // Handle logo upload if it exists
        if ($request->hasFile('logo')) {
            // Get the file and generate a unique name
            $logo = $request->file('logo');
            $logoName = uniqid() . '.' . $logo->getClientOriginalExtension();

            // Move the logo to the public folder
            $logo->move(public_path('uploads/logos'), $logoName);
            $logoPath = 'uploads/logos/' . $logoName; // Store relative path
        }

        // Get the current user's ID
        $created_by = Auth::user()->id;

        // Create the organization record
        $organization = CustomOrganization::create([
            'name' => $request->name,
            'logo' => $logoPath ?? null,
            'address' => $request->address,
            'created_by' => $created_by,
            'border_color_top' => $request->border_color_top ?? null,
            'border_color_right' => $request->border_color_right ?? null,
            'border_color_bottom' => $request->border_color_bottom ?? null,
            'border_color_left' => $request->border_color_left ?? null,
        ]);

        // Redirect back with a success message
        return redirect()->route('user.organizations')->with('success', 'Organization created successfully!');
    }



    // Display the specified organization
    public function show($id)
    {
        $organization = CustomOrganization::findOrFail($id);
        return response()->json($organization);
    }

    // Update the specified organization in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string',
        ]);

        $organization = CustomOrganization::findOrFail($id);

        // Handle logo upload if it exists
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $organization->logo = $logoPath;
        }

        // Update organization data
        $organization->update($request->only(['name', 'address']));

        return response()->json($organization);
    }

    // Remove the specified organization from storage
    public function destroy($id)
    {
        $organization = CustomOrganization::findOrFail($id);
        $organization->delete();

        return response()->json(null, 204);
    }
}
