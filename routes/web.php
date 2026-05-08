<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\AuthController;

// Public Routes
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (Must be logged in)
Route::middleware('auth')->group(function () {
    
    // Everyone logged in can see the Real-Time Map
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ONLY University Admin (Campus Director) and System Admin can see logs/contacts
    Route::middleware('role:campus_director,system_admin')->group(function () {
        Route::get('/history', [DashboardController::class, 'history']);
        Route::get('/contacts', [DashboardController::class, 'contacts']);
        Route::post('/contacts', [DashboardController::class, 'storeContact']);
    });

    // ONLY System Admin can manage hardware nodes
    Route::middleware('role:system_admin')->group(function () {
        // You can create a manageNodes method in DashboardController later
        Route::get('/nodes', [DashboardController::class, 'manageNodes']);
    });
});