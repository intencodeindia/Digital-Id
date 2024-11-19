<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            if (!in_array(Auth::user()->role, $roles)) {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
