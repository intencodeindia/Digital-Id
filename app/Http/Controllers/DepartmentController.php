<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::where('user_id', Auth::id())
            ->withCount('employees')
            ->when(request('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('organization.departments', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,NULL,id,user_id,' . Auth::id(),
            'description' => 'nullable|string',
            'status' => 'sometimes|boolean'
        ]);

        try {
            DB::beginTransaction();

            $department = Department::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'status' => $request->has('status') ? true : false
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Department created successfully!',
                'department' => $department
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error creating department: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id . ',id,user_id,' . Auth::id(),
            'description' => 'nullable|string',
            'status' => 'sometimes|boolean'
        ]);

        try {
            DB::beginTransaction();

            $department->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->has('status')
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Department updated successfully!',
                'department' => $department->fresh()
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error updating department: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleStatus(Department $department)
    {
        try {
            $department->status = !$department->status;
            $department->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully!',
                'new_status' => $department->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Department $department)
    {
        try {
            DB::beginTransaction();

            // Check if department has employees
            if ($department->employees()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete department with active employees'
                ], 422);
            }

            $department->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Department deleted successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error deleting department: ' . $e->getMessage()
            ], 500);
        }
    }
}
