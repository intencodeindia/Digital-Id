<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommanController;
use App\Http\Middleware\ApiKeyAuth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test-api', function () {
    $data = [
        'name' => 'Sunil',
        'age' => 25,
        'email' => 'sunil@gmail.com',
        'phone' => '9876543210',
        'address' => '123, abc street, xyz city, 123456',
        'data' => [
            'name' => 'Sunil',
            'age' => 25,
            'email' => 'sunil@gmail.com',
            'phone' => '9876543210',
            'address' => [
                'city' => 'xyz city',
                'state' => 'abc state',
                'country' => 'abc country',
                'pincode' => '123456'
            ]
        ]
    ];
    return $data;
});

// Middleware for API key authentication
Route::group(['middleware' => 'apiKeyAuth'], function () {
    // Auth Routes
    Route::get('/users', [AuthController::class, 'users']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
    Route::post('/resend-otp', [AuthController::class, 'resendOTP']);

    // Common Routes
    Route::get('/profile/{user_id}', [CommanController::class, 'getUser']);
    Route::get('/organizations/{user_id}', [CommanController::class, 'getOrganizations']);
    Route::get('/business-cards/{user_id}/{username}/{organization_id}', [CommanController::class, 'getBusinessCards']);
    Route::get('/digital-cards/{user_id}/{username}/{organization_id}', [CommanController::class, 'getDigitalCards']);
});
