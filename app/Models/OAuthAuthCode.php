<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OAuthAuthCode extends Model
{
    protected $fillable = [
        'user_id',
        'client_id',
        'code',
        'scopes',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'scopes' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(OAuthClient::class, 'client_id');
    }
} 