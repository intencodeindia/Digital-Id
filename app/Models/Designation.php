<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'designations';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',          // Designation name
        'description',   // Optional designation description
        'user_id'        // User ID (foreign key)
    ];

    // Optionally, you can define custom timestamps, but by default, Laravel will manage them automatically.
    public $timestamps = true;
}
