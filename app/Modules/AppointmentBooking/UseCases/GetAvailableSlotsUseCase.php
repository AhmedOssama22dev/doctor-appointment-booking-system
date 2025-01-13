<?php

namespace App\Modules\AppointmentBooking\UseCases;

use App\Modules\AppointmentBooking\Domain\Repositories\BookingRepositoryInterface;

class GetAvailableSlotsUseCase {
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository) {
        $this->bookingRepository = $bookingRepository;
    }

    public function execute() {
        return $this->bookingRepository->getAvailableSlots();
    }
}