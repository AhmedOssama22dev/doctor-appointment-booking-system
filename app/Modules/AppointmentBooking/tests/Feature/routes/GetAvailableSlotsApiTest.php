<?php

namespace App\Modules\AppointmentBooking\Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetAvailableSlotsApiTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        // make database in memory
        $this->artisan('migrate');
        $this->artisan('db:seed', ['--class' => 'SlotSeeder']);
    }

    public function testGetAvailableSlotsApiReturnsAListOfAvailableSlots(): void
    {
        
        $response = $this->get('api/patient/available-slots');
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'time',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
    }
}
