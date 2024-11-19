<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    // Display a list of portfolios
    public function index()
    {
        $user = Auth::user();
        $portfolios = Portfolio::where('user_id', $user->id)->get(); // Retrieve all portfolios
        return view('user.portfolio', compact('portfolios'));
    }

    // Store a new portfolio in the database
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'type' => 'required|in:video,image',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'file' => 'required|file', // Assuming file_path is passed as a string (or use file upload logic)
        ]);

        $userId = Auth::id();
        // Handle the file upload
        $file = $request->file('file');
        $fileName = 'file-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('UserUploads/Portfolio'), $fileName);

        // Create the portfolio with user_id
        Portfolio::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'file_path' => $fileName,
            'user_id' => $userId // Add the user_id field
        ]);

        // Redirect to portfolio list or success page
        return redirect()->route('user.portfolio')->with('success', 'Portfolio created successfully!');
    }

    // Display a single portfolio
    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        return view('user.portfolio-view', compact('portfolio'));
    }



    // Update an existing portfolio
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'type' => 'required|in:video,image',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $fileName = 'file-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('UserUploads/Portfolio'), $fileName);

        // Update the portfolio
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'file_path' => $fileName,
        ]);

        // Redirect to portfolio list or success page
        return redirect()->route('user.portfolio')->with('success', 'Portfolio updated successfully!');
    }

    // Delete an existing portfolio
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('user.portfolio')->with('success', 'Portfolio deleted successfully!');
    }
}
