<?php

namespace Tests\Unit\Modules\Availability\Repositories;

use App\Modules\Availability\Repositories\AvailabilityRepository;
use App\Modules\Availability\Models\Slot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class AvailabilityRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $slotModel;
    protected $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->slotModel = Mockery::mock(Slot::class);
        $this->repository = new AvailabilityRepository($this->slotModel);
    }

    public function testGetDoctorAvailabilitySlots()
    {
        $expectedSlots = collect([
            new Slot(['guid' => '123', 'time' => '2025-01-18 10:00', 'cost' => 200, 'is_reserved' => false]),
            new Slot(['guid' => '124', 'time' => '2025-01-18 11:00', 'cost' => 250, 'is_reserved' => false]),
        ]);

        // Mock
        $this->slotModel->shouldReceive('all')->once()->andReturn($expectedSlots);
        // Act
        $slots = $this->repository->getDoctorAvailabilitySlots();
        // Assert
        $this->assertEquals($expectedSlots, $slots);
    }

    public function testCreateDoctorAvailabilitySlot()
    {
        $data = [
            'guid' => '123',
            'time' => '2025-01-18 10:00',
            'cost' => 200,
            'is_reserved' => false,
        ];

        $this->slotModel->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn(new Slot($data));

        $createdSlot = $this->repository->createDoctorAvailabilitySlot($data);

        $this->assertInstanceOf(Slot::class, $createdSlot);
        $this->assertEquals($data['guid'], $createdSlot->guid);
        $this->assertEquals($data['time'], $createdSlot->time);
        $this->assertEquals($data['cost'], $createdSlot->cost);
        $this->assertFalse($createdSlot->is_reserved);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
