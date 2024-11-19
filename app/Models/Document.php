<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'documentId', 'name', 'file_path', 'file_type', 'added_at', 'user_id', 'document_type', 'expiry_date', 'additional_info'
    ];
}
