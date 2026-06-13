<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingTime extends Model
{
    /** @use HasFactory<\Database\Factories\PricingTimeFactory> */
    use HasFactory;

    protected $fillable = [
        'pricing_id',
        'hours',
        'value',
    ];

    public function pricing(): BelongsTo
    {
        return $this->belongsTo(Pricing::class);
    }
}
