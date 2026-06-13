<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Municipality;
use App\Models\District;
use App\Models\Pricing;
use App\Models\PricingTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Municipality::factory()
            ->count(10)
            ->create()
            ->each(function ($municipality) {

                $districts = District::factory()
                    ->count(5)
                    ->create([
                        'municipality_id' => $municipality->id,
                    ]);

                foreach ($districts as $district) {

                    $pricing = Pricing::factory()->create([
                        'municipality_id' => $municipality->id,
                        'district_id' => $district->id,
                    ]);

                    foreach ([1, 2, 4, 8] as $hours) {
                        PricingTime::factory()->create([
                            'pricing_id' => $pricing->id,
                            'hours' => $hours,
                        ]);
                    }
                }

                $defaultPricing = Pricing::factory()->create([
                    'municipality_id' => $municipality->id,
                    'district_id' => null,
                ]);

                foreach ([1, 2, 4, 8] as $hours) {
                    PricingTime::factory()->create([
                        'pricing_id' => $defaultPricing->id,
                        'hours' => $hours,
                    ]);
                }
            });
    
    }
}
