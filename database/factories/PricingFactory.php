<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Municipality;
use App\Models\Pricing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pricing>
 */
class PricingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $district = District::query()
            ->inRandomOrder()
            ->first();

        if (!$district) {
            $municipality = Municipality::factory()->create();

            $district = District::factory()->create([
                'municipality_id' => $municipality->id,
            ]);
        }

        return [
            'municipality_id' => $district->municipality_id,
            'district_id' => fake()->boolean(20)
                ? null
                : $district->id,
            'value' => fake()->randomFloat(2, 50, 500),
        ];
    }
}
