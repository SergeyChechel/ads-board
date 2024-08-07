<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('pass'), // Example password hashing, change as needed
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'middlename' => $this->faker->firstNameMale,
            'birthday' => $this->faker->date(),
            'email_verified_at' => now(),
            'role_id' => 1, // Example role ID, adjust according to your application logic
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'status' => 'active', // Example status, adjust according to your application logic
            'last_login' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
