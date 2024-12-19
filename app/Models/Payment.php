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
        'paid_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
