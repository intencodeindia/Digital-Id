<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;


class ServiceController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $services = Service::where('user_id', $user->id)->get();
        return view('user.services', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer|min:0',
        ]);

        // Handle the file upload
        $file = $request->file('thumbnail');
        $fileName = 'thumbnail-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('UserUploads/Services'), $fileName);

        // Get file extension and ensure it's 3 characters max
        $fileType = strtolower($file->getClientOriginalExtension());
        if ($fileType === 'jpeg') {
            $fileType = 'jpg';
        }

        $service = Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $fileName,
            'price' => $validated['price'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user.services')->with('success', 'Service created successfully!');
    }
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('user.services-view', compact('service'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer|min:0',
        ]);

        $service = Service::findOrFail($id);
        
        // Handle file upload only if new file is provided
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = 'thumbnail-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('UserUploads/Services'), $fileName);
        } else {
            $fileName = $service->thumbnail; // Keep existing thumbnail
        }

        $service->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $fileName,
            'price' => $validated['price'],
        ]);

        return redirect()->route('user.services')->with('success', 'Service updated successfully!');
    }
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('user.services')->with('success', 'Service deleted successfully!');
    }
}
