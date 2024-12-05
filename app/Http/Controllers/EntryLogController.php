<?php
// app/Http/Controllers/EntryLogController.php

namespace App\Http\Controllers;

use App\Models\EntryLog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EntryLogController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department' => 'required|string',
        ]);

        // Create the log entry with the current timestamp
        $log = EntryLog::create([
            'user_id' => $request->user_id,
            'department' => $request->department,
            'logged_in_at' => Carbon::now(), // Capture the current time
        ]);

        return response()->json(['status' => 'success', 'log' => $log], 201);
    }

    public function index()
{
    // Get the currently authenticated user
    $user = Auth::user();
    
    // Find all employees based on the parent_id (assuming employee's parent_id is the current user's id)
    $employees = User::where('parent_id', $user->id)->get(); // Get all employees under the current user
    
    // Retrieve all entry logs for these employees, with user info
    $logs = EntryLog::with('user') // Eager load the associated 'user' for each log entry
        ->whereIn('user_id', $employees->pluck('id')) // Filter logs by the employee ids
        ->latest() // Order logs by latest
        ->get(); // Get the logs

    // Pass the logs to the view
    return view('organization.entry-logs', compact('logs'));
}

}
