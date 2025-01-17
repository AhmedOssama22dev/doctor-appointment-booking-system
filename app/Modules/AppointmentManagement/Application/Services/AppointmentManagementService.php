<?php
namespace App\Modules\AppointmentManagement\Application\Services;

use App\Modules\AppointmentManagement\Domain\Entities\Appointment;
use App\Modules\AppointmentManagement\Domain\Repository\AppointmentRepositoryInterface;

class AppointmentManagementService
{
    protected $appointmentRepository;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function getUpcomingAppointments()
    {
        return $this->appointmentRepository->getUpcomingAppointments();
    }

    public function cancelAppointment(Appointment $appointment)
    {
        $appointment->cancelAppointment();
        $this->appointmentRepository->updateAppointmentStatus($appointment);
    }

    public function markAsCompleted(Appointment $appointment)
    {
        $appointment->markAsCompleted();
        $this->appointmentRepository->updateAppointmentStatus($appointment);
    }
}