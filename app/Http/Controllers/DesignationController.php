<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    // Store a new designation
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:designations,name',
            'description' => 'nullable|string|max:1000',
        ]);

        // Create the new designation in the database
        $designation = Designation::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('designations.index')->with('success', 'Designation created successfully!');
    }

    // Display all designations
    public function index()
    {
        $designations = Designation::all();
        return view('organization.designations', compact('designations'));
    }

    // Show the form for editing a designation
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        return view('designations.edit', compact('designation'));
    }

    // Update the specified designation in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:designations,name,' . $id,
            'description' => 'nullable|string|max:1000',
        ]);

        $designation = Designation::findOrFail($id);
        $designation->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('designations.index')->with('success', 'Designation updated successfully!');
    }

    // Remove the specified designation from the database
    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();

        return redirect()->route('designations.index')->with('success', 'Designation deleted successfully!');
    }
}
