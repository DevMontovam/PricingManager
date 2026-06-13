<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    /** @use HasFactory<\Database\Factories\MunicipalityFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function pricings(): HasMany
    {
        return $this->hasMany(Pricing::class);
    }
}
