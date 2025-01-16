<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\VcardDetail;
use App\Models\Document;
use App\Models\CustomOrganization;
use Illuminate\Support\Facades\Auth;
use App\Mail\GeneralHtmlEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function publicProfile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $services = Service::where('user_id', $user->id)->get();
        $portfolios = Portfolio::where('user_id', $user->id)->get();
        $userDetails = User::find($user->id);
        $vcardDetails = VcardDetail::where('user_id', $user->id)->first();

        // $employees = User::where('organization_id', $user->id)->get();
        // $departments = Department::where('organization_id', $user->id)->get();
        // $designations = Designation::where('organization_id', $user->id)->get();

        return view('public-portfolio', ['user' => $user, 'services' => $services, 'portfolios' => $portfolios, 'userDetails' => $userDetails, 'vcardDetails' => $vcardDetails]);
    }
    public function companyProfile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $services = Service::where('user_id', $user->id)->get();
        $portfolios = Portfolio::where('user_id', $user->id)->get();
        $userDetails = User::find($user->id);
        $vcardDetails = VcardDetail::where('user_id', $user->id)->first();
        $organization = CustomOrganization::where('created_by', $user->id)->first();
        // $employees = User::where('organization_id', $user->id)->get();
        // $departments = Department::where('organization_id', $user->id)->get();
        // $designations = Designation::where('organization_id', $user->id)->get();

        return view('public-portfolio-company', ['user' => $user, 'services' => $services, 'portfolios' => $portfolios, 'userDetails' => $userDetails, 'vcardDetails' => $vcardDetails, 'organization' => $organization]);
    }

    public function profile()
    {
        $userDetails = Auth::user();

        $vcardDetails = VcardDetail::where('user_id', $userDetails->id)->first();
        $services = Service::where('user_id', $userDetails->id)->get();
        $portfolios = Portfolio::where('user_id', $userDetails->id)->get();
        $documents = Document::where('user_id', $userDetails->id)->get();
        return view('user.profile', ['userDetails' => $userDetails, 'vcardDetails' => $vcardDetails, 'services' => $services, 'portfolios' => $portfolios, 'documents' => $documents]);
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
                'title' => 'nullable|string|max:255',
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
                    'title' => $request->title,
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

    public function twoFactorAuthentication()
    {
        $user = User::find(Auth::id());

        // Update the two_factor_authentication field
        $user->two_factor_authentication = 1;
        $user->save();

        $user = User::where('username', $user->username)->firstOrFail();
        $services = Service::where('user_id', $user->id)->get();
        $portfolios = Portfolio::where('user_id', $user->id)->get();
        $userDetails = User::find($user->id);
        $vcardDetails = VcardDetail::where('user_id', $user->id)->first();

        // Subject of the email
        $subject = "Two-factor authentication enabled successfully";

        // Dynamic content for the email body
        $content = "
        <strong>Hello {$user->username},</strong><br>
        Your two-factor authentication has been successfully enabled on your Proffid account. This will enhance the security of your account by requiring an additional step to verify your identity whenever you log in.<br><br>
    
        <strong>What is Two-Factor Authentication?</strong><br>
        Two-factor authentication (2FA) adds an extra layer of security to your account. Now, in addition to your password, you'll need to enter a verification code sent to your mobile device or authentication app.<br><br>
    
        <strong>How it works:</strong><br>
        <ul>
            <li>When you log in, you will be prompted to enter a verification code that is sent to your mobile device or authentication app.</li>
            <li>The code changes every 30 seconds, providing a higher level of security for your account.</li>
        </ul>
    
        <p>If you didn't request this change, please contact our support team immediately at <a href='mailto:support@proffid.com'>support@proffid.com</a>.</p>
    
        <p>We recommend keeping your authentication app up to date for the best security experience.</p>
    
        <p>If you have any issues or questions, feel free to reach out to our <a href='https://proffid.com/support'>Support Team</a>.</p>
    
        <br>Thank you for securing your account!<br>
        Best regards,<br>The Proffid Team
        ";

        // Send the email using the GeneralHtmlEmail Mailable
        Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));
        session()->flash('success', 'Two-factor authentication enabled successfully');

        return redirect()->route('profile');
    }

    public function twoFactorAuthenticationDisable()
    {
        $user = User::find(Auth::id());

        // Update the two_factor_authentication field
        $user->two_factor_authentication = 0;
        $user->save();

        $user = User::where('username', $user->username)->firstOrFail();
        $services = Service::where('user_id', $user->id)->get();
        $portfolios = Portfolio::where('user_id', $user->id)->get();
        $userDetails = User::find($user->id);
        $vcardDetails = VcardDetail::where('user_id', $user->id)->first();

        // Subject of the email
        $subject = "Two-factor authentication disabled successfully";

        // Dynamic content for the email body
        $content = "
     <strong>Hello {$user->username},</strong><br>
     Your two-factor authentication has been successfully disabled on your Proffid account. This means that you will no longer be required to enter a verification code to log in.<br><br>
 
     <strong>Important Note:</strong><br>
     We highly recommend keeping two-factor authentication enabled to enhance the security of your account. If you have disabled it by mistake, please consider enabling it again to protect your account from unauthorized access.<br><br>
 
     <p>If you didn't request this change, please contact our support team immediately at <a href='mailto:support@proffid.com'>support@proffid.com</a>.</p>
 
     <p>If you have any issues or questions, feel free to reach out to our <a href='https://proffid.com/support'>Support Team</a>.</p>
 
     <br>Thank you for using Proffid!<br>
     Best regards,<br>The Proffid Team
     ";
        // Send the email using the GeneralHtmlEmail Mailable
        Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));
        session()->flash('success', 'Two-factor authentication disabled successfully');
        return redirect()->route('profile');
    }

    public function PortfolioSetting()
    {
        $user = Auth::user();
        $vcardDetails = VcardDetail::where('user_id', $user->id)->first();
        return view('user.PortfolioSetting', ['user' => $user, 'vcardDetails' => $vcardDetails]);
    }

    public function updateBanner(Request $request)
    {
        try {
            $request->validate([
                'banner' => 'required|image|mimes:jpeg,png,jpg|max:10240', // 10MB max
            ]);

            $user = Auth::user();
            $vcardDetails = VcardDetail::where('user_id', $user->id)->first();

            // Handle banner photo upload
            if ($request->hasFile('banner')) {
                // Delete old banner if exists
                if ($vcardDetails && $vcardDetails->banner_photo && file_exists(public_path('uploads/banners/' . $vcardDetails->banner_photo))) {
                    unlink(public_path('uploads/banners/' . $vcardDetails->banner_photo));
                }

                $banner = $request->file('banner');
                $bannerName = time() . '.' . $banner->getClientOriginalExtension();

                // Create directory if it doesn't exist
                if (!file_exists(public_path('uploads/banners'))) {
                    mkdir(public_path('uploads/banners'), 0777, true);
                }

                $banner->move(public_path('uploads/banners'), $bannerName);

                // Create or update VcardDetail
                VcardDetail::updateOrCreate(
                    ['user_id' => $user->id],
                    ['banner_photo' => $bannerName]
                );

                return response()->json([
                    'success' => true,
                    'message' => 'Banner updated successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No banner image provided'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function accountSetting()
    {
        $user = Auth::user();
        $userDetails = User::find($user->id);
        return view('user.accountsetting', ['user' => $user, 'userDetails' => $userDetails]);
    }

    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo && file_exists(public_path('uploads/avatars/' . $user->profile_photo))) {
                unlink(public_path('uploads/avatars/' . $user->profile_photo));
            }

            $photo = $request->file('profile_photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();

            // Create directory if it doesn't exist
            if (!file_exists(public_path('uploads/avatars'))) {
                mkdir(public_path('uploads/avatars'), 0777, true);
            }

            $photo->move(public_path('uploads/avatars'), $photoName);
            $user->profile_photo = $photoName;
            $user->save();

            return redirect()->back()->with('success', 'Profile photo updated successfully');
        }

        return redirect()->back()->with('error', 'No photo uploaded');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'emailaddress' => 'required|email|unique:users,email,' . Auth::id(),
            'confirmemailpassword' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->confirmemailpassword, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Password confirmation is incorrect'
            ], 422);
        }

        $user->email = $request->emailaddress;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Email updated successfully'
        ]);
    }
}
