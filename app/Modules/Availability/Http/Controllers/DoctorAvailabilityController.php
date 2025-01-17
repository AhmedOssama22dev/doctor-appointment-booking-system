<?php

namespace App\Modules\Availability\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Modules\Availability\Services\AvailabilityService;

class DoctorAvailabilityController extends BaseController
{
    protected $availabilityService;
    public function __construct(AvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }
    public function index()
    {
        return response()->json([
            'message' => 'Doctor availability slots',
            'data' => $this->availabilityService->getDoctorAvailabilitySlots()
        ]);
    }

    public function store(Request $request)
    {
        // new validator 
        $validator = Validator::make($request->all(), [
            'time' => 'required | date_format:Y-m-d H:i',
            'cost' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $data = $request->all();
        $data['guid'] = Str::uuid();
        $this->availabilityService->createDoctorAvailabilitySlot($data);
        return response()->json(['message' => 'Doctor availability slot created']);
    }
}

