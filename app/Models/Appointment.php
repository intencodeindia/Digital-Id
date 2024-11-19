<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = ['user_id', 'service_id', 'appointment_time', 'duration_minutes', 'status', 'notes'];
}
