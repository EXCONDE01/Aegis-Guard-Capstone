<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;

Route::get('/', function () {
    return redirect('/dashboard');
});

// Real-Time Map
Route::get('/dashboard', [DashboardController::class, 'index']);

// Hazard History Logs
Route::get('/history', [DashboardController::class, 'history']);

// Alert Contacts
Route::get('/contacts', [DashboardController::class, 'contacts']);
Route::post('/contacts', [DashboardController::class, 'storeContact']);