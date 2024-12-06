<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $credentials['email'])->first();
    
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'No account found with this email.'
            ], 422);
        }
    
        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid password.'
            ], 422);
        }
    
        Auth::login($user);
        $request->session()->regenerate();
    
        // Store user info in session
        Session::put([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'digital_id' => $user->digital_id,
            'relationship' => $user->relationship,
            'parent_id' => $user->parent_id,
        ]);
    
        // Get the redirect URL based on role
        $redirectUrl = match($user->role) {
            'admin' => '/home',
            'organization' => '/home',
            'employee' => '/home',
            'familymember' => '/home',
            default => '/home',
        };
    
        return response()->json([
            'status' => 'success',
            'redirect' => $redirectUrl
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
