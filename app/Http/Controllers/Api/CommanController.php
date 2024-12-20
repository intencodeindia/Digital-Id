<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Helpers\TwoFactorAuthentication;  // A helper class for generating and verifying OTP (you need to implement this)
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\GeneralHtmlEmail;
use App\Models\CustomOrganization;

class CommanController extends Controller
{
    public function getUser($user_id)
    {
        try {
            $user = User::find($user_id); // get user from database using passed user_id
            
            if (!$user) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'User not found'
                ], 404);
            }

            $user->profile_photo = $user->profile_photo ? url('uploads/avatars/' . $user->profile_photo) : null;

            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching user data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getOrganizations($user_id)
    {
        try {
            // First check if user exists
            $user = User::find($user_id);
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not found'
                ], 404);
            }

            // Get organizations created by user
            $organizations = CustomOrganization::where('created_by', $user_id)->get();
            // logo url
            foreach ($organizations as $organization) {
                $organization->logo = $organization->logo ? url($organization->logo) : null;
            }
            if ($organizations->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'No organizations found for this user',
                    'data' => []
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Organizations retrieved successfully',
                'data' => $organizations
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching organizations',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getBusinessCards($user_id, $username, $organization_id)
    {
        return response()->json([
            'status' => 'success',
            'data' => 'Business Cards'
        ]);
    }

    public function getDigitalCards($user_id, $username, $organization_id)
    {
        return response()->json([
            'status' => 'success',
            'data' => 'Digital Cards'
        ]);
    }
}
