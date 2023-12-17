<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $suppCount = Supplier::count();
        $usCount = User::count();
        return [
            'date' => fake()->date(),
            'supplier_id' => fake()-> numberBetween(1, $suppCount),
            'total' => fake()->randomFloat(2, 0, 1000000),
            'user_id' => fake()-> numberBetween(1, $usCount),
            'invoice_no' => fake()-> randomElement()
        ];
    }
}
