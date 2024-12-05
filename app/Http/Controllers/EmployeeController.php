<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Organization;
use App\Models\Lead;
use App\Models\EntryLog;
use App\Models\EntryPermission;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Get all employees whose parent_id matches the authenticated user's parent_id
        $employees = Employee::join('users', 'employees.user_id', '=', 'users.id') // Join employees table with users table
            ->where('users.parent_id', $user->id)  // Filter employees by parent_id from the users table
            ->select('employees.*', 'users.*')  // Select all columns from both employees and users tables
            ->get();
        $departments = Department::all();
        // Return the view with the employees data
        return view('organization.employees', compact('employees', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'employee_id' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'confirm_password' => 'nullable|string|max:255|same:password',
            'status' => 'required|boolean',
            'work_type' => 'required|in:Full Time,Part Time',
        ]);

        // Generate a 12-digit random digital ID
        $digitalId = $this->generateDigitalId();

        // If password is not provided, set it to the default value
        $password = $request->password ?? 'dTO9#93h';

        // Create the user in the `users` table
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($password),  // Hash the password before saving
            'status' => $request->status,
            'role' => 'Employee',  // Assuming the role is 'Employee' by default
            'digital_id' => $digitalId,  // Store the generated digital ID
            'profile_photo' => $this->uploadProfilePhoto($request),  // Handle profile photo upload
            'parent_id' => Auth::user()->id,  // Assuming parent_id is the authenticated user's ID
        ]);

        // Now that the user has been created, fetch the user ID and use it for the employee
        $userId = $newUser->id;

        // Create the employee in the `employees` table
        $employee = Employee::create([
            'user_id' => $userId,  // Link the employee to the newly created user
            'employee_id' => $request->employee_id,  // Optional employee ID
            'department' => $request->department,
            'designation' => $request->designation,
            'joining_date' => $request->joining_date,
            'profile_photo' => $newUser->profile_photo,  // Link the profile photo from the user
            'work_type' => $request->work_type,
            'relationship' => $request->relationship,  // Assuming you have this field in the form
            'parent_id' => Auth::user()->id,  // Parent ID for the employee, assumed to be the logged-in user
        ]);

        // Redirect or return a response after saving
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    protected function generateDigitalId()
    {
        do {
            // Generate a random 12-digit number
            $digitalId = str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (User::where('digital_id', $digitalId)->exists()); // Ensure the digital ID is unique

        return $digitalId;
    }
    // Helper function to handle profile photo upload
    private function uploadProfilePhoto(Request $request)
    {
        if ($request->hasFile('profile_photo')) {
            // Store the profile photo in the 'profile_photos' folder and get the file path
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            return $path;  // Return the file path to store in the database
        }

        return null;  // Return null if no photo is uploaded
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $entry_permission = Department::leftJoin('entry_permissions', 'departments.id', '=', 'entry_permissions.department_id')
            ->where('departments.user_id', $user->id) // Make sure we only get departments of the user
            ->where(function($query) use ($id) { // Group the conditions for entry permissions
                $query->where('entry_permissions.user_id', $id) // When the user has entry permission
                      ->orWhereNull('entry_permissions.user_id'); // Or departments without entry permission
            })
            ->select('departments.*', 'entry_permissions.*', 'entry_permissions.user_id as permission_user_id') // Alias user_id
            ->get();
        
        // dd($entry_permission);
        
        $departments = Department::where('user_id', $user->id)->get();
        $employee = Employee::join('users', 'employees.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('employees.*', 'users.*')
            ->first();
        $user = User::find($employee->user_id);
        $leads = Lead::where('user_id', $id)->get();
        $entry_log = EntryLog::where('user_id', $id)->get();
        return view('organization.employees-view', compact('employee', 'user', 'leads', 'entry_permission', 'entry_log', 'departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
