<?php
namespace App\Modules\AppointmentManagement\Domain\Repository;

use App\Modules\AppointmentManagement\Domain\Entities\Appointment;

interface AppointmentRepositoryInterface
{
    public function getUpcomingAppointments();
    public function updateAppointmentStatus(Appointment $appointment);
}
