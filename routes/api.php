<?php

use App\Http\Controllers\Api\SensorDataController;

// The URL will be: http://127.0.0.1:8000/api/sensor/data
Route::post('/sensor/data', [SensorDataController::class, 'store']);