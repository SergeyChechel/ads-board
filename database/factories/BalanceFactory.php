<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Balance>
 */
class BalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Example: Create a user and use its ID
            'amount' => $this->faker->randomFloat(2, 0, 1000), // Example: Random float between 0 and 1000
            'comment' => $this->faker->sentence,
        ];
    }
}
