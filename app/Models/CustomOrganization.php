<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrganization extends Model
{
    protected $table = 'custom_organizations';
    protected $fillable = ['name', 'logo', 'address', 'border_color_top', 'border_color_right','border_color_bottom','border_color_left', 'created_by'];
}
