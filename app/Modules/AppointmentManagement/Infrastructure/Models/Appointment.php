<?php
namespace App\Modules\AppointmentManagement\Infrastructure\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = ['guid', 'slot_id', 'patient_id', 'patient_name', 'reserved_at'];

    // appointment belongs to a slot
    public function slot()
    {
        return $this->belongsTo('App\Modules\Availability\Models\Slot');
    }
}