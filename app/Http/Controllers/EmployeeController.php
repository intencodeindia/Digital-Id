<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Lead;
use App\Models\EntryLog;
use App\Models\EntryPermission;
use Illuminate\Support\Facades\Mail;
use App\Mail\GeneralHtmlEmail;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $employees = Employee::join('users', 'employees.user_id', '=', 'users.id')
            ->where('users.parent_id', $user->id)
            ->select('employees.*', 'users.*')
            ->get();

        $departments = Department::where('user_id', $user->id)->get();
        $designations = Designation::where('user_id', $user->id)->get();
        return view('organization.employees', compact('employees', 'departments', 'designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'joining_date' => 'required|date',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'employee_id' => 'nullable|string|unique:employees,employee_id',
            'status' => 'required|boolean',
            'work_type' => 'required|in:Full Time,Part Time'
        ]);

        try {
            // Handle profile photo upload similar to ProfileController
            $profilePhotoPath = null;
            if ($request->hasFile('profile_photo')) {
                $photo = $request->file('profile_photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/avatars'), $filename);
                $profilePhotoPath = $filename;
            }

            // Generate username from email
            $username = explode('@', $request->email)[0];
            $baseUsername = $username;
            $counter = 1;
            while (User::where('username', $username)->exists()) {
                $username = $baseUsername . $counter;
                $counter++;
            }

            $password = Str::random(10);
            
            // Create user with similar fields as ProfileController
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $username,
                'phone' => $request->phone,
                'password' => Hash::make($password),
                'status' => $request->status,
                'role' => 'employee',
                'profile_photo' => $profilePhotoPath,
                'parent_id' => Auth::id(),
                'digital_id' => $this->generateDigitalId()
            ]);

            // Create employee record
            Employee::create([
                'user_id' => $user->id,
                'department_id' => $request->department_id,
                'designation_id' => $request->designation_id,
                'employee_id' => $request->employee_id ?? $this->generateEmployeeId(),
                'joining_date' => $request->joining_date,
                'work_type' => $request->work_type
            ]);

            // Send welcome email using GeneralHtmlEmail like in ProfileController
            $subject = "Your Proffid Account is created successfully";
            $content = "
            <strong>Hello {$user->username},</strong><br>
            Your Proffid account is created successfully. You can now login to your account using the following credentials:<br><br>
            <strong>Username:</strong> {$user->username}<br>
            <strong>Password:</strong> {$password}<br><br>

            <p>If you have any issues or questions, feel free to reach out to our <a href='https://proffid.com/support'>Support Team</a>.</p>

            <br>Thank you for securing your account!<br>
            Best regards,<br>The Proffid Team
            ";

            Mail::to($user->email)->send(new GeneralHtmlEmail($subject, $content));
            
            return redirect()->route('organization.employees')
                ->with('success', 'Employee added successfully!');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding employee: ' . $e->getMessage()
            ], 500);
        }
    }

    protected function generateDigitalId()
    {
        do {
            $digitalId = str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (User::where('digital_id', $digitalId)->exists());

        return $digitalId;
    }

    protected function generateEmployeeId()
    {
        do {
            $employeeId = 'EMP' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Employee::where('employee_id', $employeeId)->exists());

        return $employeeId;
    }

    public function show($id)
    {
        $user = Auth::user();
        $entry_permission = Department::leftJoin('entry_permissions', 'departments.id', '=', 'entry_permissions.department_id')
            ->where('departments.user_id', $user->id)
            ->where(function ($query) use ($id) {
                $query->where('entry_permissions.user_id', $id)
                    ->orWhereNull('entry_permissions.user_id');
            })
            ->select('departments.*', 'entry_permissions.*', 'entry_permissions.user_id as permission_user_id')
            ->get();

        $departments = Department::where('user_id', $user->id)->get();
        $designations = Designation::where('user_id', $user->id)->get();

        $employee = Employee::join('users', 'employees.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('employees.*', 'users.*')
            ->first();
        $user = User::find($employee->user_id);
        $leads = Lead::where('user_id', $id)->get();
        $entry_log = EntryLog::where('user_id', $id)->get();
        return view('organization.employees-view', compact('employee', 'user', 'leads', 'entry_permission', 'entry_log', 'departments', 'designations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'department' => 'required|exists:departments,id',
            'designation' => 'required|exists:designations,id',
            'joining_date' => 'required|date',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'employee_id' => 'nullable|string|unique:employees,employee_id,' . $id . ',user_id',
            'status' => 'required|boolean',
            'work_type' => 'required|in:Full Time,Part Time'
        ]);
    
        try {
            // Check if employee exists
            $employee = Employee::where('user_id', $id)->first();
            if (!$employee) {
                return back()->withInput()->withErrors('Employee not found.');
            }
    
            // Check if user associated with the employee exists
            $user = User::find($id);
            if (!$user) {
                return back()->withInput()->withErrors('User associated with employee not found.');
            }
    
            // Handle profile photo upload
            if ($request->hasFile('profile_photo')) {
                $photo = $request->file('profile_photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/avatars'), $filename);
                $profilePhotoPath = $filename;
            }
    
            // Update user details
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
            ];
    
            if (isset($profilePhotoPath)) {
                $userData['profile_photo'] = $profilePhotoPath;
            }
    
            if ($request->filled('password')) {
                $request->validate([
                    'password' => 'required|min:8',
                    'confirm_password' => 'required|same:password',
                ]);
                $userData['password'] = Hash::make($request->password);
            }
    
            $user->update($userData);
    
            // Update employee details
            $employee->update([
                'department_id' => $request->department,
                'designation_id' => $request->designation,
                'employee_id' => $request->employee_id ?? $employee->employee_id,
                'joining_date' => $request->joining_date,
                'work_type' => $request->work_type
            ]);
    
            return redirect()->route('employees.view', $id)
                ->with('success', 'Employee information updated successfully!');
    
        } catch (\Exception $e) {
            Log::error('Employee Update Error', [
                'employee_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return back()->withInput()
                ->withErrors('An error occurred while updating employee information: ' . $e->getMessage());
        }
    }
    

    public function destroy($id)
    {
        // Add delete logic here
    }
}
