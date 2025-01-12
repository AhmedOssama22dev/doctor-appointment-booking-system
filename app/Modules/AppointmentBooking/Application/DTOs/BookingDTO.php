<?php

namespace App\Modules\AppointmentBooking\Application\DTOs;

class BookingDTO {
    public $Id;
    public $SlotId;
    public $PatientId;
    public $PatientName;
    public $ReservedAt;
    
    public function __construct($Id, $SlotId, $PatientId, $PatientName, $ReservedAt = now()) {
        $this->Id = $Id;
        $this->SlotId = $SlotId;
        $this->PatientId = $PatientId;
        $this->PatientName = $PatientName;
        $this->ReservedAt = $ReservedAt;
    }

}