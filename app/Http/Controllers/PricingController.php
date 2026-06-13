<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\PricingTime;
use App\Models\Municipality;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::with([
            'municipality',
            'district',
            'times',
        ])->get();

        $municipalities = Municipality::with([
            'districts',
            'pricings.district',
        ])->get();

        return view('pricing.index', [
            'pricings' => $pricings,
            'municipalities' => $municipalities,
        ]);
    }

    public function update(
        Request $request,
        Pricing $pricing
    ) {
        $request->validate([
            'times' => ['required', 'array'],
        ]);

        foreach ($request->times as $time) {

            $pricingTime = PricingTime::find(
                $time['id']
            );

            $pricingTime->update([
                'value' => $time['value'],
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}