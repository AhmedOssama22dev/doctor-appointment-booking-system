<?php
namespace App\Modules\Availability\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'slots';
    protected $fillable = ['guid', 'time', 'doctor_name', 'is_reserved', 'cost'];
    // let's assume that all slots are one hour long to avoid complexity and adding duration field

    // slot has one appointment
    public function appointment()
    {
        return $this->hasOne('App\Modules\AppointmentBooking\Infrastructure\Models\Appointment');
    }

}