<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surgery>
 */
class SurgeryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'operation_name'=>fake()->name(),
            'doctor_id'=> fake()->randomElement(Doctor::get()),
            'patient_id'=> fake()->randomElement(Patient::get()),
            'room_id'=> fake()->randomElement(Room::get()),
            'duration'=>fake()->numberBetween(1,24),
            'schedule_date'=>fake()->date()
        ];
    }
}
