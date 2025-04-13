<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_number' => fake()->unique()->randomNumber(),
            'status' => fake()->randomElement(['occupied','vacant','underMaintenance']),
            'department_id' => fake()->randomElement(Department::get()),
            'type' => fake()->randomElement(['ICU','general','surgical']),
            'beds_number' => fake()->numberBetween(1,10),
        ];
    }
}
