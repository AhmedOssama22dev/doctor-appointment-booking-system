<?php

namespace App\Modules\AppointmentBooking\Domain\Entities;

class Appointment {
    protected $slotId;
    protected $patientId;
    protected $patientName;
    protected $reservedAt;
    protected $appointmentTime;
    protected $doctorName;

    public function __construct($slotId, $patientId, $patientName, $reservedAt, $appointmentTime, $doctorName) {
        $this->slotId = $slotId;
        $this->patientId = $patientId;
        $this->patientName = $patientName;
        $this->reservedAt = $reservedAt;
        $this->appointmentTime = $appointmentTime;
        $this->doctorName = $doctorName;
    }

    public function getSlotId() {
        return $this->slotId;
    }

    public function getPatientId() {
        return $this->patientId;
    }

    public function getPatientName() {
        return $this->patientName;
    }

    public function getReservedAt() {
        return $this->reservedAt;
    }

    public function getAllData() {
        return [
            'slotId' => $this->slotId,
            'patientId' => $this->patientId,
            'patientName' => $this->patientName,
            'reservedAt' => $this->reservedAt,
            'appointmentTime' => $this->appointmentTime,
            'doctorName' => $this->doctorName
        ];
    }
}