<?php

namespace App\Modules\AppointmentManagement\Tests\Unit\Infrastructure\Presistence;

use Database\Factories\AppointmentFactory;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Modules\AppointmentManagement\Infrastructure\Presistence\AppointmentRepository;
use App\Modules\AppointmentManagement\Infrastructure\Models\Appointment as AppointmentModel;

class AppointmentRepositoryTest extends TestCase
{
    // use DatabaseMigrations;

    // public function testGetUpcomingAppointments()
    // {
    //     // create 3 appointments with appointment status as pending from AppointmentFactory class
    //     AppointmentFactory::new()->create(['status' => 'pending']);
    //     AppointmentFactory::new()->create(['status' => 'pending']);
    //     AppointmentFactory::new()->create(['status' => 'pending']);        

    //     $repository = new AppointmentRepository();
    //     $appointments = $repository->getUpcomingAppointments();

    //     $this->assertCount(3, $appointments);
    //     foreach ($appointments as $appointment) {
    //         $this->assertEquals('pending', $appointment->status);
    //     }
    // }

}