<?php

use App\Http\Controllers\PricingController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    fn () => redirect('/pricing')
);

Route::get(
    '/pricing',
    [PricingController::class, 'index']
);

Route::put(
    '/pricing/{pricing}',
    [PricingController::class, 'update']
);

Route::get(
    '/municipalities',
    [MunicipalityController::class, 'index']
);

Route::get(
    '/districts',
    [DistrictController::class, 'index']
);

Route::get(
    '/about',
    [AboutController::class, 'index']
);