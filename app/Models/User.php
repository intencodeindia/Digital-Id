<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'digital_id',
        'status',
        'username',
        'profile_photo',
        'bio',
        'phone',
        'relationship',
        'parent_id',
        'email_verified_link',
        'organization_logo',
        'two_factor_authentication',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => 'boolean',
    ];

    /**
     * Check if user has a specific role.
     */
    public function hasRole($role): bool
    {
        if (is_array($role)) {
            return in_array($this->role, $role);
        }
        return $this->role === $role;
    }

    /**
     * Get the family members associated with the user.
     */
    public function familyMembers()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    /**
     * Get the parent user.
     */
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function hasActiveSubscription(): bool
    {
        return $this->payments()
            ->where('subscription_status', 'active')
            ->where('subscription_end_date', '>', now())
            ->exists();
    }

    public function isInTrialPeriod(): bool
    {
        return $this->created_at->addDays(15)->gt(now());
    }

    public function currentSubscription()
    {
        return $this->payments()
            ->where('subscription_status', 'active')
            ->where('subscription_end_date', '>', now())
            ->latest()
            ->first();
    }
}
