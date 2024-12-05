<?php

// app/Http/Controllers/EntryPermissionController.php

namespace App\Http\Controllers;

use App\Models\EntryPermission;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class EntryPermissionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Create the EntryPermission record
        $entryPermission = EntryPermission::create([
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
        ]);

        return response()->json(['status' => 'success', 'entry_permission' => $entryPermission], 201);
    }

    public function index()
    {
        $permissions = EntryPermission::with(['user', 'department'])->get(); // Fetch all permissions with user and department data

        return response()->json(['status' => 'success', 'permissions' => $permissions]);
    }
}
