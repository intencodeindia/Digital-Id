<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'transaction_id',
        'merchant_id',
        'provider_reference_id',
        'merchant_order_id',
        'checksum',
        'payment_status',
        'response_msg',
        'payment_method',
        'paid_at',
        'subscription_start_date',
        'subscription_end_date',
        'subscription_status',
        'plan_type'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'subscription_start_date' => 'datetime',
        'subscription_end_date' => 'datetime',
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if subscription is active
     */
    public function isSubscriptionActive(): bool
    {
        return $this->subscription_status === 'active' && 
               $this->subscription_end_date > now();
    }

    /**
     * Check if user is in trial period
     */
    public function isInTrialPeriod(): bool
    {
        $trialEndDate = $this->user->created_at->addDays(15);
        return now()->lt($trialEndDate);
    }
}
