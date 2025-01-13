<?php

namespace App\Modules\AppointmentBooking\Application\DTOs;

class BookingDTO {
    public $Id;
    public $slotId;
    public $patientId;
    public $patientName;
    public $reservedAt;
    
    public function __construct($Id, $slotId, $patientId, $patientName, $reservedAt = now()) {
        $this->Id = $Id;
        $this->slotId = $slotId;
        $this->patientId = $patientId;
        $this->patientName = $patientName;
        $this->reservedAt = $reservedAt;
    }

}