<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // Specify the table name (optional, if the table name is not the plural form of the model name)
    protected $table = 'portfolios';

    // Fillable properties to allow mass assignment
    protected $fillable = [
        'type',
        'title',
        'description',
        'price',
        'file_path',
        'user_id',
    ];

    // Relationship with User model (each portfolio belongs to one user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
