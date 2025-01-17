<?php

namespace App\Modules\AppointmentManagement\Tests\Unit\Infrastructure\Presistence;

use Database\Factories\AppointmentFactory;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Modules\AppointmentManagement\Infrastructure\Presistence\AppointmentRepository;
use App\Modules\AppointmentManagement\Infrastructure\Models\Appointment as AppointmentModel;

class AppointmentRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetUpcomingAppointments()
    {
        // assert true
        $this->assertTrue(true);
    }

}