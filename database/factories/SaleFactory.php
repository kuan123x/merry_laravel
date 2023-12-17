<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cusCount = Customer::count();
        $usCount = User::count();
        return [
            'customer_id' => fake()->numberBetween(1,$cusCount),
            'date' => fake()-> date(),
            'is_credit' => fake()->randomFloat(2, 0, 1000000),
            'user_id' => fake()->numberBetween(1,$usCount),


        ];
    }
}
