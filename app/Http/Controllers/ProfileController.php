<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\VcardDetail;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function publicProfile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $services = Service::where('user_id', $user->id)->get();
        $portfolios = Portfolio::where('user_id', $user->id)->get();

        return view('user.public-profile', ['user' => $user, 'services' => $services, 'portfolios' => $portfolios]);
    }

    public function profile()
    {
        $userDetails = Auth::user();
        $vcardDetails = VcardDetail::where('user_id', $userDetails->id)->first();
        return view('profile', ['userDetails' => $userDetails, 'vcardDetails' => $vcardDetails]);
    }

    public function profileUpdate(Request $request)
{
    try {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:500',
            'organization' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'social_media_facebook' => 'nullable|url|max:255',
            'social_media_twitter' => 'nullable|url|max:255',
            'social_media_linkedin' => 'nullable|url|max:255',
            'social_media_instagram' => 'nullable|url|max:255',
        ]);

        // Get the current authenticated user
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        // Update basic user information
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->save();

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo && file_exists(public_path('uploads/avatars/' . $user->profile_photo))) {
                unlink(public_path('uploads/avatars/' . $user->profile_photo));
            }
            
            $avatar = $request->file('profile_photo');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/avatars'), $avatarName);
            $user->profile_photo = $avatarName;
            $user->save();
        }

        // Update vCard details
        $vcardDetails = VcardDetail::updateOrCreate(
            ['user_id' => $user_id],
            [
                'address' => $request->address,
                'organization' => $request->organization,
                'website' => $request->website,
                'social_media_facebook' => $request->social_media_facebook,
                'social_media_twitter' => $request->social_media_twitter,
                'social_media_linkedin' => $request->social_media_linkedin,
                'social_media_instagram' => $request->social_media_instagram,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 422);
        }
    }
    
}
