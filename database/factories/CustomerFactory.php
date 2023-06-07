<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->word(),
            'age'=>fake()->numberBetween(1,40),
            'gender' => fake()->randomElement(['male', 'female']),
            'salary'=>fake()->numberBetween(20_000,40_0000)
        ];
    }
}
