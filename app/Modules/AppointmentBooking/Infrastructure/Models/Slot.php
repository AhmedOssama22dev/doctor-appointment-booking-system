<?php
namespace App\Modules\AppointmentBooking\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $table = 'slots';
    protected $fillable = ['guid', 'time', 'doctor_name', 'is_reserved', 'cost'];
    // let's assume that all slots are one hour long to avoid complexity and adding duration field

    public function scopeUpcoming($query)
    {
        return $query->where('time', '>=', now());
    }
    public function scopeAvailable($query)
    {
        return $query->where('is_reserved', false)->upcoming();
    }
}