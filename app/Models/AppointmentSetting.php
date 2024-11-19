<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentSetting extends Model
{
    //
    protected $fillable = ['base_price', 'available_days', 'working_hours_start', 'working_hours_end', 'slot_duration', 'break_time', 'max_appointments', 'user_id'];
}
