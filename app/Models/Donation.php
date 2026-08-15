<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'email', 'amount_cents', 'currency', 'frequency',
        'stripe_session_id', 'stripe_customer_id', 'status',
    ];

    public function getAmountFormattedAttribute(): string
    {
        return '$'.number_format($this->amount_cents / 100, 2).' '.strtoupper($this->currency);
    }
}
