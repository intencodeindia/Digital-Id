<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = ['user_id', 'service_id', 'appointment_time', 'duration_minutes', 'status', 'notes'];

    public function service()
    {
        // Assuming the related model is called 'Service' and the foreign key is 'service_id'
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function appointments()
    {
        // A service can have many appointments
        return $this->hasMany(Appointment::class);
    }
    public function user()
    {
        // An appointment belongs to a user, and the foreign key is 'user_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}
