<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    /** @use HasFactory<\Database\Factories\DistrictFactory> */
    use HasFactory;

    protected $fillable = [
        'municipality_id',
        'name',
    ];

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function pricings(): HasMany
    {
        return $this->hasMany(Pricing::class);
    }
}
