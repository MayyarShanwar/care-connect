<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'patient_id' => fake()->randomElement(Patient::get()),
        'doctor_id'=> fake()->randomElement(Doctor::get()),
        'room_id'=> fake()->randomElement(Room::get()),
        'blood_type'=> fake()->randomElement(['A+','A-','B-','B+','O+','O-','AB-','AB+']),
        'admission_date'=>fake()->date(),
        'discharge_date'=>fake()->date(),
        'medicines'=>json_encode(fake()->randomElements(['Sitamol'.'CrepStop','CrepOff','Amoxisiline','Advil'])),
        'details'=>fake()->text(),
        ];
    }
}
