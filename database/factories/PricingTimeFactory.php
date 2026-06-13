<?php

namespace Database\Factories;

use App\Models\PricingTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PricingTime>
 */
class PricingTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hours' => fake()->randomElement([
                1,
                2,
                4,
                8,
            ]),
            'value' => fake()->randomFloat(
                2,
                50,
                500
            ),
        ];
    }
}
