<?php
namespace App\Modules\Availability\Routes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Availability\Http\Controllers\DoctorAvailabilityController;

// Add prefix
Route::prefix('doctor/availability')->group(function () {
    Route::get('slots', [DoctorAvailabilityController::class, 'index']);
    Route::post('slot', [DoctorAvailabilityController::class, 'store']);
});
