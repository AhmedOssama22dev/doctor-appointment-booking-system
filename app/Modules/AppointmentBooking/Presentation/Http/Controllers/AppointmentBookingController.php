<?php

namespace App\Modules\AppointmentBooking\Presentation\Http\Controllers;

use App\Modules\AppointmentBooking\UseCases\BookSlotUseCase;
use App\Modules\AppointmentBooking\UseCases\GetAvailableSlotsUseCase;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Modules\AppointmentBooking\Application\DTOs\BookingDTO;

class AppointmentBookingController extends BaseController
{
    protected $getAvailableSlotsUseCase;
    protected $bookSlotUseCase;

    public function __construct(
        GetAvailableSlotsUseCase $getAvailableSlotsUseCase,
        BookSlotUseCase $bookSlotUseCase
    ) {
        $this->getAvailableSlotsUseCase = $getAvailableSlotsUseCase;
        $this->bookSlotUseCase = $bookSlotUseCase;
    }
    public function index(Request $request)
    {
        // Get available slots
        // execute use case
        $availableSlots = $this->getAvailableSlotsUseCase->execute();
        return response()->json(['data' => $availableSlots], 200);
    }

    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'slot_id' => 'required',
            'patient_id' => 'required',
            'patient_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // construct booking DTO
        $bookingDTO = new BookingDTO(
            Str::uuid(),
            $request->slot_id,
            $request->patient_id,
            $request->patient_name,
        );
        
        // execute use case to book a slot (passing booking DTO)
        $appointment = $this->bookSlotUseCase->execute($bookingDTO);
        return response()->json([
            'message' => 'Appointment booked successfully', 
            'data' => $appointment
        ], 201);
    }
}