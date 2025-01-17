<?php

namespace App\Modules\AppointmentBooking\Presentation\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Modules\AppointmentBooking\UseCases\BookSlotUseCase;
use App\Modules\AppointmentBooking\Application\DTOs\BookingDTO;
use App\Modules\AppointmentBooking\UseCases\GetAvailableSlotsUseCase;
use App\Modules\AppointmentBooking\Domain\Repositories\BookingRepositoryInterface;

class AppointmentBookingController extends BaseController
{
    protected $getAvailableSlotsUseCase;
    protected $bookSlotUseCase;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->getAvailableSlotsUseCase = new GetAvailableSlotsUseCase($bookingRepository);
        $this->bookSlotUseCase = new BookSlotUseCase($bookingRepository);
    }
    public function index(Request $request)
    {
        $availableSlots = $this->getAvailableSlotsUseCase->execute();
        return response()->json(['data' => $availableSlots], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slot_id' => 'required',
            'patient_id' => 'required',
            'patient_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $bookingDTO = new BookingDTO(
            Str::uuid(),
            $request->slot_id,
            $request->patient_id,
            $request->patient_name,
            now()
        );

        // execute use case to book a slot (passing booking DTO)
        $appointment = $this->bookSlotUseCase->execute($bookingDTO);
        return response()->json([
            'message' => 'Appointment booked successfully',
            'data' => $appointment
        ], 201);
    }
}