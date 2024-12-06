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
    CustomOrganizationController,
    EmployeeController,
    DesignationController,
    ContactController,
    DepartmentController,
    LeadController,
    EntryLogController,
    Auth\LoginController,
    Auth\RegisterController
};

// Public routes
Route::get('/', function () {
    return view('landing');
})->middleware('guest');

Route::get('/in/{username}', [ProfileController::class, 'publicProfile'])->name('public.profile');
Route::post('/in/{username}/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/in/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/card/{username}', [HomeController::class, 'card'])->name('card');
Route::get('/business-card/{username}', [HomeController::class, 'businessCard'])->name('business-card');
Route::get('/verify-email/verify/{token}', [HomeController::class, 'verifyEmail'])->name('verify.email');
Route::get('/support', [HomeController::class, 'support'])->name('support');
Route::get('/about', [HomeController::class, 'about'])->name('about');
// Route to show the OTP verification page
// Route to handle OTP verification
Route::post('/two-factor-authentication-verify', [LoginController::class, 'verifyOtp'])->name('two-factor-authentication-verify');
Route::get('/two-factor-authentication-code', [LoginController::class, 'showOtpVerificationForm'])->name('two-factor-authentication-code');

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
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'profileUpdate'])->name('profileupdate');
    // Common routes
    Route::get('/digital-id', [HomeController::class, 'digitalId'])->name('digital-id');
    Route::get('/business-id-card', [HomeController::class, 'businessIdCard'])->name('business-id-card');
    Route::post('/two-factor-authentication', [ProfileController::class, 'twoFactorAuthentication'])->name('twofactor');
    Route::post('/two-factor-authentication-disable', [ProfileController::class, 'twoFactorAuthenticationDisable'])->name('twofactordisable');
    // Admin routes
    Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/users', [HomeController::class, 'users'])->name('admin.users');
        Route::get('/organizations', [HomeController::class, 'organizations'])->name('admin.organizations');
        Route::get('/organization/view/{id}', [HomeController::class, 'organizationView'])->name('admin.organization.view');

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

        Route::get('/organizations', [CustomOrganizationController::class, 'index'])->name('user.organizations');
        Route::post('/organization/store', [CustomOrganizationController::class, 'store'])->name('user.organization.store');
        Route::get('/organization/view/{id}', [CustomOrganizationController::class, 'show'])->name('user.organization.view');
        Route::put('/organization/update/{id}', [CustomOrganizationController::class, 'update'])->name('user.organization.update');
        Route::delete('/organization/delete/{id}', [CustomOrganizationController::class, 'destroy'])->name('user.organization.delete');
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
    Route::middleware(['role:organization', 'auth'])->group(function () {
        Route::get('dashboard', [HomeController::class, 'organizationDashboard'])->name('organization.dashboard');

        // Employees routes
        Route::get('/employees', [EmployeeController::class, 'index'])->name('organization.employees');
        Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.view');
        Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
        // Departments routes
        Route::get('/departments', [DepartmentController::class, 'index'])->name('organization.departments');
        Route::post('/departments/store', [DepartmentController::class, 'store'])->name('departments.store');

        // Designations routes
        Route::get('/designations', [DesignationController::class, 'index'])->name('organization.designations');
        Route::post('/designations/store', [DesignationController::class, 'store'])->name('designations.store');
        // Entry logs routes
        Route::get('/entry-logs', [EntryLogController::class, 'index'])->name('organization.entry-logs');

        Route::get('/leads', [LeadController::class, 'index'])->name('organization.leads');
    });


    // Employee routes
    Route::middleware(['role:employee', 'auth'])->group(function () {
        Route::get('/employee/leads', [LeadController::class, 'index'])->name('employee.leads');
        Route::get('/employee/entry-logs', [EntryLogController::class, 'index'])->name('employee.entry-logs');
    });

    // Family member routes
    Route::middleware(['role:familymember', 'auth'])->group(function () {
        // Add specific family member routes here if needed
    });
});
