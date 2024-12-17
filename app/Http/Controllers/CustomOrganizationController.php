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
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|string',
            'border_color_0' => 'required|string', // Top
            'border_color_1' => 'required|string', // Right
            'border_color_2' => 'required|string', // Bottom
            'border_color_3' => 'required|string', // Left
        ]);

        try {
            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/logos'), $logoName);
                $logoPath = 'uploads/logos/' . $logoName;
            }

            // Create organization
            $organization = CustomOrganization::create([
                'name' => $request->name,
                'logo' => $logoPath ?? null,
                'address' => $request->address,
                'created_by' => Auth::id(),
                'border_color_top' => $request->border_color_0,
                'border_color_right' => $request->border_color_1,
                'border_color_bottom' => $request->border_color_2,
                'border_color_left' => $request->border_color_3,
                'background_color' => '#ffffff', // Default background color
            ]);

            return redirect()->route('user.organizations')
                           ->with('success', 'Organization created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Error creating organization: ' . $e->getMessage())
                           ->withInput();
        }
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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'required|string',
            'border_color_0' => 'nullable|string',
            'border_color_1' => 'nullable|string',
            'border_color_2' => 'nullable|string',
            'border_color_3' => 'nullable|string',
        ]);

        try {
            $organization = CustomOrganization::findOrFail($id);

            // Handle logo upload
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($organization->logo && file_exists(public_path($organization->logo))) {
                    unlink(public_path($organization->logo));
                }

                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/logos'), $logoName);
                $organization->logo = 'uploads/logos/' . $logoName;
            }

            // Update organization details
            $organization->name = $request->name;
            $organization->address = $request->address;
            
            // Update border colors if provided
            if ($request->has('border_color_0')) {
                $organization->border_color_top = $request->border_color_0;
                $organization->border_color_right = $request->border_color_1;
                $organization->border_color_bottom = $request->border_color_2;
                $organization->border_color_left = $request->border_color_3;
            }

            $organization->save();

            return redirect()->route('user.organizations')
                            ->with('success', 'Organization updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('error', 'Error updating organization: ' . $e->getMessage())
                            ->withInput();
        }
    }

    // Remove the specified organization from storage
    public function destroy($id)
    {
        try {
            $organization = CustomOrganization::findOrFail($id);
            
            // Delete logo file if exists
            if ($organization->logo && file_exists(public_path($organization->logo))) {
                unlink(public_path($organization->logo));
            }

            $organization->delete();

            return redirect()->route('user.organizations')
                           ->with('success', 'Organization deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Error deleting organization: ' . $e->getMessage());
        }
    }
}
