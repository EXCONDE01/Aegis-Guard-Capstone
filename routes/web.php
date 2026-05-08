<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\AuthController;

// Public Routes (Anyone can see the login page)
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Protected Routes (Only logged-in admins can access these)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/history', [DashboardController::class, 'history']);
    Route::get('/contacts', [DashboardController::class, 'contacts']);
    Route::post('/contacts', [DashboardController::class, 'storeContact']);
});