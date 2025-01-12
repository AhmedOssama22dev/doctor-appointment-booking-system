<?php

namespace App\Modules\AppointmentBooking\Presentation\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Modules\Availability\Services\AvailabilityService;
use App\Modules\AppointmentBooking\Application\DTOs\BookingDTO;

class AppointmentBookingController extends BaseController
{
    public function index(Request $request)
    {
        // Get available slots
        // execute use case
    }

    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'slot_id' => 'required|exists:slots,id',
            'patient_id' => 'required|exists:patients,id',
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
    }
}