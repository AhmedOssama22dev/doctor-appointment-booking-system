<?php
namespace App\Modules\AppointmentManagement\Presentation\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Validator;
use App\Modules\AppointmentManagement\Infrastructure\Models\Slot;
use App\Modules\AppointmentManagement\Domain\Entities\Appointment;
use App\Modules\AppointmentManagement\Domain\Repository\AppointmentRepositoryInterface;
use App\Modules\AppointmentManagement\Application\Services\AppointmentManagementService;

class AppointmentManagementController
{
    private $appointmentManagementService;
    public function __construct(AppointmentRepositoryInterface $appointmentRepositoryInterface)
    {
        $this->appointmentManagementService = new AppointmentManagementService($appointmentRepositoryInterface);
    }
    public function index()
    {
        $upcomingAppointments = $this->appointmentManagementService->getUpcomingAppointments();
        return response()->json($upcomingAppointments);
    }

    public function cancelAppointment($appointmentId)
    {
        $appointment = new Appointment($appointmentId);
        $this->appointmentManagementService->cancelAppointment($appointment);
        return response()->json(['message' => 'Appointment cancelled successfully']);
    }

    public function completeAppointment($appointmentId)
    {
        $appointment = new Appointment($appointmentId);
        $this->appointmentManagementService->markAsCompleted($appointment);
        return response()->json(['message' => 'Appointment completed successfully']);
    }
}