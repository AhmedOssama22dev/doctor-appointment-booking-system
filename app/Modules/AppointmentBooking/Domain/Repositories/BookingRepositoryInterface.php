<?php
namespace App\Modules\AppointmentBooking\Domain\Repositories;

interface BookingRepositoryInterface
{
    public function getAvailableSlots();
    public function bookSlot($bookingDTO);
}