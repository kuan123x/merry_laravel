<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'last_name' => fake()->lastName(),
           'first_name' => fake()->firstName(),
           'address' => fake()->city(),
           'phone' => fake()->numerify('###############'),
           'email' => fake()->unique()->safeEmail(),
           'sex' => fake()->randomElement(['Male', 'Female']),
           'birth_date' => fake()->date(),
           'max_credit' => fake()->randomFloat(2, 0, 1000000),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
