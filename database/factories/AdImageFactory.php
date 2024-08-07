<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdImage>
 */
class AdImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pic_id' => $this->faker->numberBetween(10000, 999999),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'file_path' => 'path/to/file', // Example file path
            'tags' => $this->faker->words(3, true),
            'upload_date' => $this->faker->dateTime(),
            'dimensions' => $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2),
            'source' => $this->faker->url,
            'status' => $this->faker->randomElement(['published', 'pending', 'deleted']),
        ];
    }
}
