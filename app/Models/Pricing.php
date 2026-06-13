<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pricing extends Model
{
    /** @use HasFactory<\Database\Factories\PricingFactory> */
    use HasFactory;

    protected $fillable = [
        'municipality_id',
        'district_id',
        'value',
    ];

    protected $casts = [
        'value' => 'decimal:2',
    ];

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function times(): HasMany
    {
        return $this->hasMany(PricingTime::class);
    }
}
