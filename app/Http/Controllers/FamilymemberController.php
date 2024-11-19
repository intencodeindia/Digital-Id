<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;  // Assuming the appointments are linked to users (clients)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FamilymemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $family = User::where('parent_id', Auth::user()->id)->get();
        return view('user.family', compact('family'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle the file upload
        $file = $request->file('photo');
        $fileName = 'photo-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('UserUploads/Family'), $fileName);

        $parent_id = Auth::user()->id;
        $digitalId = $this->generateDigitalId();
        // Create family member
        $familymember = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('Digital@123'), // Set default password
            'role' => 'familymember',
            'digital_id' => $digitalId,
            'status' => 0,
            'username' => strtolower(str_replace(' ', '', $request->name)), // Generate username from name
            'parent_id' => $parent_id,
            'profile_photo' => $fileName,
            'phone' => $request->phone,
            'relationship' => $request->relation,
        ]);

        return redirect()->route('user.family')->with('success', 'Family member created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $familymember = User::findOrFail($id);
        return view('user.family-view', compact('familymember'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $familymember = User::findOrFail($id);
        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $familymember->id,
            'phone' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'relationship' => $request->relation,
        ];

        // Handle photo upload only if a new photo is provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = 'photo-' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('UserUploads/Family'), $fileName);
            $updateData['profile_photo'] = $fileName;
        }

        // Update the family member
        $familymember->update($updateData);

        return redirect()->route('user.family')->with('success', 'Family member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $familymember)
    {
        // Delete the family member
        $familymember->delete();

        return redirect()->route('user.family')->with('success', 'Family member deleted successfully!');
    }
    // Helper method to generate a 12-digit unique digital ID
    protected function generateDigitalId()
    {
        do {
            $digitalId = mt_rand(100000000000, 999999999999); // Generate a random 12-digit number
        } while (User::where('digital_id', $digitalId)->exists()); // Ensure the ID is unique

        return $digitalId;
    }
}
