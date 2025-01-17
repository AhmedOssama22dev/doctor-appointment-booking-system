<?php
namespace App\Modules\AppointmentManagement\Infrastructure\Presistence;

use App\Modules\AppointmentManagement\Infrastructure\Models\Slot;
use App\Modules\AppointmentManagement\Domain\Entities\Appointment;
use App\Modules\AppointmentManagement\Domain\Repository\AppointmentRepositoryInterface;
use App\Modules\AppointmentManagement\Infrastructure\Models\Appointment as AppointmentModel;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function getUpcomingAppointments()
    {
        $upcomingAppointments = AppointmentModel::where('status', 'pending')->get();
        return $upcomingAppointments;
    }

    public function updateAppointmentStatus(Appointment $appointment)
    {
        $appointmentModel = AppointmentModel::find($appointment->id);
        $appointmentModel->status = $appointment->status;
        $appointmentModel->save();
        if ($appointment->status == 'cancelled') {
            $slot = Slot::find($appointmentModel->slot_id);
            $slot->is_reserved = false;
            $slot->save();
        }
    }
}