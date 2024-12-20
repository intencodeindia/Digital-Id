<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Lead;
use App\Models\EntryLog;
use App\Models\EntryPermission;
use Illuminate\Support\Facades\Mail;
use App\Mail\GeneralHtmlEmail;


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
            DB::beginTransaction();
            // Handle profile photo
            $profilePhotoPath = null;
            if ($request->hasFile('profile_photo')) {
                $photo = $request->file('profile_photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/avatars'), $filename);
                $profilePhotoPath = $filename;
            }

            // Generate username from email
            $username = explode('@', $request->email)[0];
            
            // Make sure username is unique
            $baseUsername = $username;
            $counter = 1;
            while (User::where('username', $username)->exists()) {
                $username = $baseUsername . $counter;
                $counter++;
            }

            $password = Str::random(10);
            // Create user
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

            // Create employee
            $employee = Employee::create([
                'user_id' => $user->id,
                'department_id' => $request->department_id,
                'designation_id' => $request->designation_id,
                'employee_id' => $request->employee_id ?? $this->generateEmployeeId(),
                'joining_date' => $request->joining_date,
                'work_type' => $request->work_type
            ]);

            DB::commit();
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
            return response()->json([
                'success' => true,
                'message' => 'Employee added successfully!',
                'employee' => $employee->load('user', 'department', 'designation')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
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
            // Generate employee ID with EMP prefix and 6 digits
            $employeeId = 'EMP' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Employee::where('employee_id', $employeeId)->exists());

        return $employeeId;
    }
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
        $designations = Designation::where('user_id', $user->id)->get();

        $employee = Employee::join('users', 'employees.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('employees.*', 'users.*')
            ->first();
        $user = User::find($employee->user_id);
        $leads = Lead::where('user_id', $id)->get();
        $entry_log = EntryLog::where('user_id', $id)->get();
        return view('organization.employees-view', compact('employee', 'user', 'leads', 'entry_permission', 'entry_log', 'departments','designations'));
    }

    public function update(Request $request, $id)
    {
        // Add update logic here
    }

    public function destroy($id)
    {
        // Add delete logic here
    }
}
