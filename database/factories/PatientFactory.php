<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mobile_number' => fake()->phoneNumber(),
            'name' => fake()->unique()->name(),
            'address' => fake()->address(),
            'birth_date' => fake()->date(),
            'medical_description' => fake()->text(),
            'gender'=> fake()->randomElement(['Male','Female'])
        ];
    }
}
