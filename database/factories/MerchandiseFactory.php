<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchandise>
 */
class MerchandiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => fake()->words(2, true),
            'description' => fake()-> sentences(2,true),
            'retail_price' => fake()-> randomFloat(2, 0, 1000000),
            'wholesale_price' => fake()-> randomFloat(2, 0, 1000000),
            'wholesale_qty' => fake()-> randomNumber(),
            'qty_stock' => fake()-> randomNumber()
        ];
    }
}
