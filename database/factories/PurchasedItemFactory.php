<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchasedItem>
 */
class PurchasedItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $merCount = Merchandise::count();
        $purCount = Purchase::count();
        return [
            'merchandise_id' => fake()->numberBetween(1,$merCount),
            'purchase_id' => fake()->numberBetween(1,$purCount),
            'wholesale_qty' => fake()->randomNumber(),
            'purchase_price' => fake()->randomFloat(2, 0, 1000000),


        ];
    }
}
