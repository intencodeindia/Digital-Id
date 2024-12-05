<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrganization extends Model
{
    protected $table = 'custom_organizations';
    protected $fillable = ['name', 'logo', 'address', 'created_by'];
}
