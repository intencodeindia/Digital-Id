<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    DocumentController,
    ServiceController,
    PortfolioController,
    ProfileController,
    AppointmentController,
    FamilymemberController,
    AppointmentSettingController,
    Auth\LoginController,
    Auth\RegisterController
};

// Public routes
Route::get('/', function () {
    return view('landing');
})->middleware('guest');

Route::get('/in/{username}', [ProfileController::class, 'publicProfile'])->name('public.profile');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('registeruser');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginuser');
    Route::get('/organization/register', [RegisterController::class, 'organizationRegister'])->name('organization.register');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Common routes
    Route::get('/digital-id', [HomeController::class, 'digitalId'])->name('digital-id');

    Route::get('/card', [HomeController::class, 'card'])->name('card');

    // Admin routes
    Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/users', [HomeController::class, 'users'])->name('admin.users');
        Route::get('/organizations', [HomeController::class, 'organizations'])->name('admin.organizations');
        Route::get('/organization/view/{id}', [HomeController::class, 'organizationView'])->name('admin.organization.view');
        Route::get('/employees', [HomeController::class, 'employees'])->name('admin.employees');
        Route::get('/settings', [HomeController::class, 'settings'])->name('admin.settings');
        Route::get('/transactions', [HomeController::class, 'transactions'])->name('admin.transactions');
        Route::get('/users/view/{id}', [HomeController::class, 'userView'])->name('admin.users.view');
        Route::get('/users/edit/{id}', [HomeController::class, 'userEdit'])->name('admin.users.edit');
    });

    // User routes
    Route::middleware(['role:user', 'auth'])->group(function () {
        Route::get('/subscription', function () {
            return view('user.subscription');
        });
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'profileUpdate'])->name('profile.update');

        // Document management
        Route::controller(DocumentController::class)->prefix('documents')->name('user.documents')->group(function () {
            Route::get('/', 'index');
            Route::get('/view/{id}', 'show')->name('.show');
            Route::post('/store', 'store')->name('.store');
            Route::get('/delete/{id}', 'destroy')->name('.destroy');
            Route::put('/update/{id}', 'update')->name('.update');
        });

        // Family management
        Route::controller(FamilymemberController::class)->prefix('family')->name('user.family')->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store')->name('.store');
            Route::get('/view/{id}', 'show')->name('-view');
            Route::put('/update/{id}', 'update')->name('-update');
        });
        // Services management
        Route::controller(ServiceController::class)->prefix('services')->name('user.services')->group(function () {
            Route::get('/', 'index');
            Route::post('/store', 'store')->name('.store');
            Route::get('/view/{id}', 'show')->name('.show');
            Route::get('/delete/{id}', 'destroy')->name('.destroy');
            Route::put('/update/{id}', 'update')->name('.update');
        });

        // Portfolio management
        Route::controller(PortfolioController::class)->prefix('portfolio')->name('user.portfolio')->group(function () {
            Route::get('/', 'index');
            Route::post('/store', 'store')->name('.store');
            Route::get('/view/{id}', 'show')->name('-view');
            Route::get('/delete/{id}', 'destroy')->name('.destroy');
            Route::put('/update/{id}', 'update')->name('.update');
        });

        // Appointment settings
        Route::controller(AppointmentSettingController::class)->prefix('appointment')->name('appointment.settings')->group(function () {
            Route::get('/settings', 'index');
            Route::post('/settings', 'store')->name('.store');
        });
        Route::controller(AppointmentController::class)->prefix('appointments')->name('appointments')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
        });
    });

    // Organization routes
    Route::middleware(['role:organization', 'auth'])->group(function () {});

    // Employee routes
    Route::middleware(['role:employee', 'auth'])->group(function () {});

    // Family member routes
    Route::middleware(['role:familymember', 'auth'])->group(function () {
        // Add specific family member routes here if needed
    });
});
