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
        return view('user.organizations', compact('organizations'));
    }

    // Store a newly created organization in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string',
            // 'created_by' => 'required|exists:users,id',  // Ensure the user exists
        ]);

        // Handle logo upload if it exists
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('uploads/logos', 'public');
        }

        $created_by = Auth::user()->id;
        // Create organization record
        $organization = CustomOrganization::create([
            'name' => $request->name,
            'logo' => $logoPath ?? null,
            'address' => $request->address,
            'created_by' => $created_by,
        ]);

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
