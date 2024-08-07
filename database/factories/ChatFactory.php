<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
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
            'ad_id' => \App\Models\Ad::inRandomOrder()->first()->id, // Example: Create an ad and use its ID
            'messages' => $this->faker->paragraph,
            // Other attributes if needed
        ];
    }
}
