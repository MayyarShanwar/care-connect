<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'image' => '',
            'salary' => fake()->randomNumber(1,20)*10000,
            'department_id' => fake()->randomElement(Department::get()),
            'address' => fake()->address(),
            'mobile_number' => fake()->phoneNumber(),
            'days' => json_encode(fake()->randomElements(['Sunday'.'Monday','Tuesday','Wednesday','thursday','Friday','Saturday'])),
            'speciality' => fake()->randomElement([
                'Anesthesiology',
                'Cardiology',
                'Dermatology',
                'Emergency Medicine',
                'Endocrinology',
                'Gastroenterology',
                'General Surgery',
                'Geriatrics'
            ]),
            'job_date' => fake()->date(),
            'start_work' => fake()->time('H:i'),
            'end_work' => fake()->time('H:i')
        ];
    }
}
