<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldItem>
 */
class SoldItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $merCount = Merchandise::count();
        $saCount = Sale::count();
        return [
            'merchandise_id' => fake()->numberBetween(1,$merCount),
            'sale_id' => fake()->numberBetween(1,$saCount),
            'qty' => fake()->randomNumber(),
            'selling_price' => fake()-> randomFloat(2, 0, 1000000),
        ];
    }
}
