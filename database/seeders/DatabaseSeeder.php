<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Room;
use App\Models\Service;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Department::factory(20)->create();
        // Room::factory(40)->create();
        // Doctor::factory(40)->create();
        Service::factory(10)->create();

        

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
