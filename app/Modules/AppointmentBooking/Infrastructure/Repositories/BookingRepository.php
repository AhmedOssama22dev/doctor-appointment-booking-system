<?php
namespace App\Modules\AppointmentBooking\Infrastructure\Repositories;

use App\Modules\AppointmentBooking\Infrastructure\Models\Slot;
use App\Modules\AppointmentBooking\Infrastructure\Models\Appointment;
use App\Modules\AppointmentBooking\Domain\Repositories\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    public function getAvailableSlots()
    {
        // get available slots
        $availableSlots = Slot::where('is_reserved', false)->get();
        return $availableSlots;
    }

    public function bookSlot($bookingDTO)
    {
        // book a slot
        $slot = Slot::find($bookingDTO->slotId);
        $slot->is_reserved = true;
        $slot->save();
        
        // create an appointment
        $appointment = new Appointment();
        $appointment->slot_id = $bookingDTO->slotId;
        $appointment->patient_id = $bookingDTO->patientId;
        $appointment->patient_name = $bookingDTO->patientName;
        $appointment->reserved_at = $bookingDTO->reservedAt;
        $appointment->save();
    }
}