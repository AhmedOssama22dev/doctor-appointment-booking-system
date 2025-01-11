<?php

namespace App\Modules\Availability\Repositories;

use App\Modules\Availability\Models\Slot;


class AvailabilityRepository {
    protected $model;

    public function __construct(Slot $model) {
        $this->model = $model;
    }

    // list all slots
    public function getDoctorAvailabilitySlots() {
        return $this->model->all();
    }

    // create a slot
    public function createDoctorAvailabilitySlot($data) {
        return $this->model->create($data);
    }
    
}