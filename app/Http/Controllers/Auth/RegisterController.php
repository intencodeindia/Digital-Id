<?php
// app/Http/Controllers/Auth/RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'username' => 'required|string|unique:users',
            'phone' => 'nullable|string|max:20',
        ]);

        DB::beginTransaction();
        try {
            // Create user
            $user = User::create([
                'name' => $validated['first-name'] . ' ' . $validated['last-name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'username' => $validated['username'],
                'phone' => $validated['phone'] ?? null,
                'role' => 'user',
                'digital_id' => $this->generateDigitalId(),
                'status' => true,
            ]);

            // Assign default user role
            $user->roles()->attach(2); // Assuming 2 is the ID for the 'user' role

            DB::commit();
            return redirect()->route('login')->with('status', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    protected function generateDigitalId()
    {
        do {
            $digitalId = str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (User::where('digital_id', $digitalId)->exists());

        return $digitalId;
    }
}
