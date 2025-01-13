<?php

namespace App\Modules\AppointmentConfirmation\Application\Listners;

use App\Events\EventName;
use App\Modules\AppointmentBooking\Application\Entities\Appointment\Events\AppointmentBooked;

class ConfirmAppointment
{
    /**
     * Handle the event.
     */
    public function handle(AppointmentBooked $event)
    {
        $data = $event->appointment->getAllData();

        \Log::info('Appointement booked', ['data' => $data]);
    }
}
