<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\AuthController;

// ==========================================
// PUBLIC ROUTES
// ==========================================

// Redirect root domain straight to login
Route::get('/', function () {
    return redirect('/login');
});

// Authentication endpoints
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// PROTECTED APPLICATION ROUTES
// ==========================================
Route::middleware('auth')->group(function () {
    
    // Command Center: Real-Time Map (Accessible by all logged-in roles)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ------------------------------------------
    // CAMPUS SAFETY TOOLS (Director & SysAdmin)
    // ------------------------------------------
    Route::middleware('role:campus_director,system_admin')->group(function () {
        // Hazard History Logs
        Route::get('/history', [DashboardController::class, 'history']);
        
        // Emergency Alert Contacts
        Route::get('/contacts', [DashboardController::class, 'contacts']);
        Route::post('/contacts', [DashboardController::class, 'storeContact']);
        
        // Manual Alert Dispatch System
        Route::get('/manual-alert', [DashboardController::class, 'manualAlert'])->name('manual.alert');
        Route::post('/manual-alert/dispatch', [DashboardController::class, 'dispatchAlert'])->name('manual.dispatch');
    });

    // ------------------------------------------
    // IT INFRASTRUCTURE TOOLS (SysAdmin Only)
    // ------------------------------------------
    Route::middleware('role:system_admin')->group(function () {
        // Edge-Node Network Connectivity
        Route::get('/nodes', [DashboardController::class, 'manageNodes']);
        
        // Sensor Threshold Calibration
        Route::get('/thresholds', [DashboardController::class, 'showThresholds']);
        Route::post('/thresholds', [DashboardController::class, 'updateThresholds']);
        
        // Gateway & VLAN Topology Visualizer
        Route::get('/gateway', function () { 
            return view('gateway'); 
        });
        
        // System SQL Backups
        Route::get('/backups', function () { 
            return view('backups'); 
        });
    });
});