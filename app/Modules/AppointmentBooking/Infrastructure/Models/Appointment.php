<?php
namespace App\Modules\AppointmentBooking\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = ['guid', 'slot_id', 'patient_id', 'patient_name', 'reserved_at'];
}