<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\OAuthClient;
use App\Models\OAuthAccessToken;
use App\Models\OAuthAuthCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authorize(Request $request)
    {
        $request->validate([
            'client_id' => 'required|string',
            'redirect_uri' => 'required|url',
            'response_type' => 'required|in:code',
            'scope' => 'nullable|string',
            'state' => 'required|string',
        ]);

        $client = OAuthClient::where('client_id', $request->client_id)
            ->where('redirect_uri', $request->redirect_uri)
            ->firstOrFail();

        if (!Auth::check()) {
            session(['oauth_return_url' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        // Generate authorization code
        $authCode = OAuthAuthCode::create([
            'user_id' => Auth::id(),
            'client_id' => $client->id,
            'code' => Str::random(40),
            'scopes' => $request->scope,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        return redirect($client->redirect_uri . '?' . http_build_query([
            'code' => $authCode->code,
            'state' => $request->state,
        ]));
    }

    public function token(Request $request)
    {
        $request->validate([
            'grant_type' => 'required|in:authorization_code',
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'code' => 'required|string',
            'redirect_uri' => 'required|url',
        ]);

        $client = OAuthClient::where('client_id', $request->client_id)
            ->where('client_secret', $request->client_secret)
            ->firstOrFail();

        $authCode = OAuthAuthCode::where('code', $request->code)
            ->where('client_id', $client->id)
            ->where('expires_at', '>', Carbon::now())
            ->firstOrFail();

        // Generate access token
        $accessToken = OAuthAccessToken::create([
            'user_id' => $authCode->user_id,
            'client_id' => $client->id,
            'token' => Str::random(60),
            'scopes' => $authCode->scopes,
            'expires_at' => Carbon::now()->addDays(30),
        ]);

        // Delete used authorization code
        $authCode->delete();

        return response()->json([
            'access_token' => $accessToken->token,
            'token_type' => 'Bearer',
            'expires_in' => Carbon::now()->diffInSeconds($accessToken->expires_at),
            'scope' => $accessToken->scopes,
        ]);
    }

    public function userInfo(Request $request)
    {
        $token = OAuthAccessToken::where('token', $request->bearerToken())
            ->where('expires_at', '>', Carbon::now())
            ->firstOrFail();

        $user = $token->user;

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
} 