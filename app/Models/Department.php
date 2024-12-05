<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // By default, Laravel assumes the primary key column is 'id'. If you want to make it explicit:
    
    // Define the table associated with the model
    protected $table = 'departments';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'id',          // Department name
        'description',   // Department description (optional)
        'user_id'        // User ID (foreign key)
    ];

    // Optionally, if you want to automatically handle timestamps, you can enable this:
    public $timestamps = true;
}
