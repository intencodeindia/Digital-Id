<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Get the bearer token from the Authorization header
        $bearerToken = $request->bearerToken();
        
        // Check if bearer token exists
        if (!$bearerToken) {
            return response()->json(['message' => 'Unauthorized - Secret key is required'], 401);
        }

        // Validate the bearer token
        if ($bearerToken !== env('API_SECRET_KEY')) {
            return response()->json(['message' => 'Unauthorized - Invalid Secret key'], 401);
        }

        return $next($request);
    }
}
