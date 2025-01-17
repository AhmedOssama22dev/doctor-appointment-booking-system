<?php

namespace App\Modules\AppointmentManagement\Presentation\routes;

use Illuminate\Support\Facades\Route;
use App\Modules\AppointmentManagement\Presentation\Http\Controllers\AppointmentManagementController;

Route::group(['prefix' => 'doctor/appointment-management'], function () {
    Route::get('/upcoming-appointments', [AppointmentManagementController::class, 'index'])->name('upcoming-appointments');
    Route::put('/appointments/{appointmentId}/cancel', [AppointmentManagementController::class, 'cancelAppointment'])->name('appointments.cancel');
    Route::put('/appointments/{appointmentId}/complete', [AppointmentManagementController::class, 'completeAppointment'])->name('appointments.complete');
});