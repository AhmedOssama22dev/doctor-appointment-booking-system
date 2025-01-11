<?php
namespace App\Modules\Availability\Services;

use App\Modules\Availability\Repositories\AvailabilityRepository;

class AvailabilityService {
    protected $availabilityRepository;
    public function __construct(AvailabilityRepository $availabilityRepository) {
        $this->availabilityRepository = $availabilityRepository;
    }
    public function getDoctorAvailabilitySlots() {
        return $this->availabilityRepository->getDoctorAvailabilitySlots();
    }

    public function createDoctorAvailabilitySlot($data) {
        return $this->availabilityRepository->createDoctorAvailabilitySlot($data);
    }
}