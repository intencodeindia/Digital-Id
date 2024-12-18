<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\User;
use App\Models\VcardDetail;
use App\Models\CustomOrganization;


class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $documents = Document::where('user_id', $user->id)->get(); // total count of documents
        $services = Service::where('user_id', $user->id)->get(); // total count of services
        $portfolios = Portfolio::where('user_id', $user->id)->get(); // total count of portfolios

        #fetch details of user
        $userDetails = User::find($user->id);

        return view('home', compact('documents', 'services', 'portfolios', 'userDetails')); // This will load the home view, which extends the layout
    }



    public function adminDashboard()
    {
        // Get counts for documents, services, and portfolios
        $documents = Document::count();
        $services = Service::count();
        $portfolios = Portfolio::count();
        #fetch details of user
        $total_users = User::where('role', 'user')->count();
        $total_organizations = User::where('role', 'organization')->count();
        $total_employees = User::where('role', 'employee')->count();
        $total_familymembers = User::where('role', 'familymember')->count();
        $total_admins = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact('documents', 'services', 'portfolios', 'total_users', 'total_organizations', 'total_employees', 'total_familymembers', 'total_admins'));
    }

    public function users()
    {
        #fetch all users
        $users = User::all()->where('role', 'user');
        return view('admin.users', compact('users'));
    }

    public function userView($id)
    {
        $user = User::find($id);
        $documents = Document::where('user_id', $id)->count(); // total count of documents
        $services = Service::where('user_id', $id)->count(); // total count of services
        $portfolios = Portfolio::where('user_id', $id)->count(); // total count of portfolios
        return view('admin.user-view', compact('user', 'documents', 'services', 'portfolios'));
    }

    public function organizations()
    {
        $organizations = User::all()->where('role', 'organization');
        return view('admin.organizations', compact('organizations'));
    }

    public function employees()
    {
        return view('admin.employees');
    }

    public function transactions()
    {
        return view('admin.transactions');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function digitalId()
    {
        $user = Auth::user();

        $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
            ->where('users.id', $user->id)
            ->select('users.*', 'vcard_details.*')
            ->first();
        if ($user->role == 'user') {
            $organizations = CustomOrganization::where('created_by', $user->id)->get();
        } else {
            $organizations = [];
        }

        return view('user.digital-id', compact('userDetails', 'organizations'));
    }


    public function card($username)
    {
        $user = User::where('username', $username)->first();

        // Perform a join between the 'users' and 'vcard_details' table
        $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
            ->where('users.id', $user->id)
            ->select('users.*', 'vcard_details.*') // Select columns from both tables
            ->first();
        return view('user.card', compact('userDetails'));
    }
    public function cardorg($username, $organizationId)
    {
        $user = User::where('username', $username)->first();

        // Perform a join between the 'users' and 'vcard_details' table
        $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
            ->where('users.id', $user->id)
            ->select('users.*', 'vcard_details.*') // Select columns from both tables
            ->first();

        // Fetch the organization details
        $organization = CustomOrganization::find($organizationId);

        return view('user.card-org', compact('userDetails', 'organization'));
    }
    public function businessCard($username)
    {
        $user = User::where('username', $username)->first();

        // Perform a join between the 'users' and 'vcard_details' table
        $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
            ->where('users.id', $user->id)
            ->select('users.*', 'vcard_details.*') // Select columns from both tables
            ->first();

        return view('user.business-card', compact('userDetails'));
    }

    public function businessIdCard()
    {
        $user = Auth::user();

        // Get user details with vcard information
        $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
            ->where('users.id', $user->id)
            ->select('users.*', 'vcard_details.*')
            ->first();

        // Get organizations if user is a regular user
        if ($user->role == 'user') {
            $organizations = CustomOrganization::where('created_by', $user->id)->get();
        } else {
            $organizations = [];
        }

        return view('user.business-id-card', compact('userDetails', 'organizations'));
    }

    public function businessCardOrg($username, $organizationId)
    {
        $user = User::where('username', $username)->first();

        // Get user details with vcard information
        $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
            ->where('users.id', $user->id)
            ->select('users.*', 'vcard_details.*')
            ->first();

        // Get the organization details
        $organization = CustomOrganization::findOrFail($organizationId);

        return view('user.business-card-org', compact('userDetails', 'organization'));
    }

    // Verify email
    public function verifyEmail($token)
    {

        $tokenwithlink = 'http://localhost:8000/verify-email/verify/' . $token;
        $user = User::where('email_verified_link', $tokenwithlink)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->email_verified_link = null;
            $user->save();
        }
        return redirect()->route('login')->with('success', 'Email verified successfully');
    }

    public function organizationDashboard()
    {
        return view('organization.dashboard');
    }

    public function organizationProfile()
    {
        return view('organization.profile');
    }

    public function organizationEmployees()
    {
        $user = Auth::user();
        $employees = User::where('parent_id', $user->id)->get();
        return view('organization.employees', compact('employees'));
    }

    public function organizationDepartments()
    {
        return view('organization.departments');
    }

    public function organizationDesignations()
    {
        return view('organization.designations');
    }

    public function organizationLeads()
    {
        return view('organization.leads');
    }

    public function about()
    {
        return view('about');
    }

    public function support()
    {
        return view('support');
    }

    public function termsAndConditions()
    {
        return view('terms-and-conditions');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function refundPolicy()
    {
        return view('refund-policy');
    }
}
