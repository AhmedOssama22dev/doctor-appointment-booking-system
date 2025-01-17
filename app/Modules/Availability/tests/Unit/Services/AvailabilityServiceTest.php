<?php

namespace App\Modules\Availability\Tests\Unit\Services;

use Mockery;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Modules\Availability\Models\Slot;
use App\Modules\Availability\Services\AvailabilityService;
use App\Modules\Availability\Repositories\AvailabilityRepository;

class AvailabilityServiceTest extends TestCase
{
    protected $availabilityService;
    protected $availabilityRepository;
    protected $slotModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->slotModel = Mockery::mock(Slot::class);
        $this->availabilityRepository = Mockery::mock(AvailabilityRepository::class);
        $this->availabilityService = new AvailabilityService($this->availabilityRepository);
    }

    public function testGetDoctorAvailabilitySlots()
    {
        $expectedData = [
            ['guid' => Str::uuid(), 'time' => '2025-01-18 10:00', 'cost' => 200]
        ];

        $this->availabilityRepository->shouldReceive('getDoctorAvailabilitySlots')
            ->once()
            ->andReturn($expectedData);

        $result = $this->availabilityService->getDoctorAvailabilitySlots();
        $this->assertEquals($expectedData, $result);
    }

    public function testCreateDoctorAvailabilitySlot()
    {
        $data = [
            'guid' => Str::uuid(),
            'time' => '2025-01-18 10:00',
            'cost' => 200
        ];

        $this->availabilityRepository->shouldReceive('createDoctorAvailabilitySlot')
            ->once()
            ->with($data)
            ->andReturn(true);

        $result = $this->availabilityService->createDoctorAvailabilitySlot($data);
        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
