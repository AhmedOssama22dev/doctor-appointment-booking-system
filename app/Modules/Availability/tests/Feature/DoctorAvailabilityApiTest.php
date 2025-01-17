<?php

namespace App\Modules\Availability\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Modules\Availability\Models\DoctorAvailability;
use App\Modules\Availability\Services\AvailabilityService;
use Illuminate\Support\Str;

class DoctorAvailabilityApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
    }

    public function testDoctorAvailabilitySlotsReturnsSuccessResponse()
    {
        // Mock service to return sample data
        $this->mock(AvailabilityService::class, function ($mock) {
            $mock->shouldReceive('getDoctorAvailabilitySlots')->once()->andReturn([
                ['guid' => Str::uuid(), 'time' => '2025-01-18 10:00', 'cost' => 200]
            ]);
        });

        $response = $this->getJson('api/doctor/availability/slots');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'message',
                     'data' => [
                         '*' => ['guid', 'time', 'cost']
                     ]
                 ]);
    }

    public function testDoctorAvailabilitySlotCanBeCreated()
    {
        $data = [
            'time' => '2025-01-18 10:00',
            'cost' => 200
        ];

        $response = $this->postJson('api/doctor/availability/slot', $data);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Doctor availability slot created']);

        $this->assertDatabaseHas('slots', [
            'time' => '2025-01-18 10:00',
            'cost' => 200
        ]);
    }

    public function testDoctorAvailabilitySlotValidationFails()
    {
        $data = [
            'time' => 'invalid-date',
            'cost' => null
        ];

        $response = $this->postJson('api/doctor/availability/slot', $data);

        $response->assertStatus(401)
                 ->assertJsonStructure(['error']);
    }
}
