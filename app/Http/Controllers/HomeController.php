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
    
    // Perform a join between the 'users' and 'vcard_details' table
    $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
                        ->where('users.id', $user->id)
                        ->select('users.*', 'vcard_details.*') // Select columns from both tables
                        ->first();

    return view('user.digital-id', compact('userDetails'));
    }

    public function card()
    {
        $user = Auth::user();
    
        // Perform a join between the 'users' and 'vcard_details' table
        $userDetails = User::join('vcard_details', 'users.id', '=', 'vcard_details.user_id')
                            ->where('users.id', $user->id)
                            ->select('users.*', 'vcard_details.*') // Select columns from both tables
                            ->first();
    
        return view('user.card', compact('userDetails'));
    }
}
