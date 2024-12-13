<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VcardDetail extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'organization',
        'title',
        'website',
        'social_media_facebook',
        'social_media_twitter',
        'social_media_linkedin',
        'social_media_instagram',
        'note',
        'banner_photo',
    ];
}
