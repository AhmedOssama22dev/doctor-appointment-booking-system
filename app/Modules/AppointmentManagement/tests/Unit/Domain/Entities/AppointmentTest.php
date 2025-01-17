<?php

namespace App\Modules\AppointmentManagement\Tests\Unit\Domain\Entities;

use PHPUnit\Framework\TestCase;
use App\Modules\AppointmentManagement\Domain\Entities\Appointment;

class AppointmentTest extends TestCase
{
    public function testInitializationWithPendingStatus()
    {
        $appointment = new Appointment(1);
        $this->assertEquals('pending', $appointment->status);
    }

    public function testMarkAsCompleted()
    {
        $appointment = new Appointment(1);
        $appointment->markAsCompleted();

        $this->assertEquals('completed', $appointment->status);
    }

    public function testCancelAppointment()
    {
        $appointment = new Appointment(1);
        $appointment->cancelAppointment();

        $this->assertEquals('cancelled', $appointment->status);
    }
}
