<?php

namespace App\Modules\AppointmentManagement\Domain\Entities;

class Appointment
{


    public function __construct(
        public $id,
        public $status = 'pending',
    ) {
    }

    public function cancelAppointment()
    {
        $this->status = 'cancelled';

    }

    public function markAsCompleted()
    {
        $this->status = 'completed';
    }


}