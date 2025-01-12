<?php
namespace App\Modules\AppointmentBooking\Routes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\AppointmentBooking\Http\Controllers\AppointmentBookingController;

// Add prefix
Route::prefix('patient')->group(function () {
    Route::get('available-slots', [AppointmentBookingController::class, 'index']);
    Route::post('book-slot', [AppointmentBookingController::class, 'store']);
});
