<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Example: Create a user and use its ID
            'is_verified' => $this->faker->boolean,
            'reject_reason' => $this->faker->sentence,
            // 'chat_id' => \App\Models\Chat::factory(1)->create(), 
            'chat_id' => null, 
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id, // Example: Create a category and use its ID
            'manager_verificator_id' => \App\Models\User::inRandomOrder()->first()->id, // Example: Create a user and use its ID
            'location' => $this->faker->address,
            'status' => $this->faker->randomElement([1, 2, 3]), // Example: Random status
            'meta_title' => $this->faker->sentence,
            'meta_desc' => $this->faker->sentence,
            'meta_keywords' => $this->faker->words(5, true),
            'url' => $this->faker->url,
            'relative_urls' => json_encode([$this->faker->url, $this->faker->url]),
        ];
    }
}
