<?php
namespace App\Modules\AppointmentBooking\UseCases;

use App\Modules\AppointmentBooking\Application\DTOs\BookingDTO;
use App\Modules\AppointmentBooking\Domain\Repositories\BookingRepositoryInterface;
use App\Modules\AppointmentBooking\Domain\Entities\Appointment as AppointmentEntity;
use App\Modules\AppointmentBooking\Application\Entities\Appointment\Events\AppointmentBooked;

class BookSlotUseCase {
    protected $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository) {
        $this->bookingRepository = $bookingRepository;
    }

    public function execute(BookingDTO $bookingDTO) {
        $appointment = $this->bookingRepository->bookSlot($bookingDTO);
        $appointmentEntity = new AppointmentEntity(
            $bookingDTO->slotId,
            $bookingDTO->patientId,
            $bookingDTO->patientName,
            $bookingDTO->reservedAt,
            $appointment->slot->time,
            $appointment->slot->doctor_name
        );
        // fire an event
        event(new AppointmentBooked($appointmentEntity));
        return $appointment;
    }
    
}