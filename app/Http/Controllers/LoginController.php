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
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'No account found with this email.',
            ])->onlyInput('email');
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Invalid password.',
            ])->onlyInput('email');
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

        // Role-based redirection
        return match($user->role) {
            'admin' => redirect()->intended('/admin/dashboard'),
            'organization' => redirect()->intended('/organization/dashboard'),
            'employee' => redirect()->intended('/employee/dashboard'),
            'familymember' => redirect()->intended('/family/dashboard'),
            default => redirect()->intended('/dashboard'),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
