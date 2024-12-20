<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\OAuthAccessToken;
use Carbon\Carbon;

class ValidateOAuthToken
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $accessToken = OAuthAccessToken::where('token', $token)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$accessToken) {
            return response()->json(['error' => 'Invalid or expired token'], 401);
        }

        $request->merge(['oauth_token' => $accessToken]);
        return $next($request);
    }
} 