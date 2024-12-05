<?php 
namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LeadController extends Controller
{
    // Display all leads
    public function index()
    {
        $user = Auth::user();
        $employee = User::where('parent_id', $user->id)->get();
        $employeeIds = $employee->pluck('id');
        $leads = Lead::whereIn('user_id', $employeeIds)->get(); // Fetch all leads
        // dd($leads);
        return view('organization.leads', compact('leads'));
    }

    // Store a new lead
    public function store(Request $request)
    {
        $user = Auth::user();
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Create a new lead
        Lead::create([
            'user_id' => $user->id, // Set the authenticated user as the lead owner
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return redirect()->route('organization.leads')->with('success', 'Lead created successfully.');
    }
}
