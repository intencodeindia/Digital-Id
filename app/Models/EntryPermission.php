<?php

// app/Models/EntryPermission.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'department_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // User who has the permission
    }

    public function department()
    {
        return $this->belongsTo(Department::class); // Department to which the permission applies
    }
}
