<?php

namespace App\Modules\AppointmentBooking\Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BookSlotApiTest extends TestCase
{
    use DatabaseMigrations;
    public function setUp(): void
    {
        parent::setUp();
        // make database in memory
        $this->artisan('migrate');
        $this->artisan('db:seed', ['--class' => 'SlotSeeder']);
    }
    public function testBookSlotApiReturnsABookingConfirmation(): void
    {
        $response = $this->post('api/patient/book-slot', [
            'slot_id' => 1,
            'patient_id' => 1,
            'patient_name' => 'John Doe'
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'message',
            'data' => [
                'id',
                'slot_id',
                'patient_id',
                'patient_name',
                'created_at',
                'updated_at'
            ]
        ]);
    }
}
