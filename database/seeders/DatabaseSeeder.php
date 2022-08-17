<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\School;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        School::factory(3)
            ->has(Student::factory()->count(100))
            ->has(Teacher::factory()->count(20))
            ->create();
        
    }
}
