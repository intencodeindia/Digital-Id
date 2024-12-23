<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::where('user_id', Auth::id())
            ->withCount('employees')
            ->when(request('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('organization.designations', compact('designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:designations,name,NULL,id,user_id,' . Auth::id(),
            'description' => 'nullable|string',
        ]);

        try {
            $designation = Designation::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => Auth::id(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Designation created successfully!',
                'designation' => $designation
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating designation: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:designations,name,' . $designation->id . ',id,user_id,' . Auth::id(),
            'description' => 'nullable|string',
        ]);

        try {
            $designation->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Designation updated successfully!',
                'designation' => $designation->fresh()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating designation: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Designation $designation)
    {
        try {
            if ($designation->employees()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete designation with active employees'
                ], 422);
            }

            $designation->delete();

            return response()->json([
                'success' => true,
                'message' => 'Designation deleted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting designation: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleStatus(Designation $designation)
    {
        try {
            $designation->status = !$designation->status;
            $designation->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully!',
                'new_status' => $designation->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status: ' . $e->getMessage()
            ], 500);
        }
    }
}
