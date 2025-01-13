<?php
namespace App\Modules\AppointmentBooking\Application\Entities\Appointment\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Modules\AppointmentBooking\Domain\Entities\Appointment as AppointmentEntity;

class AppointmentBooked {
    use Dispatchable, SerializesModels;

    public $appointment;

    public function __construct(AppointmentEntity $appointment) {
        $this->appointment = $appointment;
    }
}