<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\School;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Ramsey\Collection\AbstractArray;

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
        //School::factory()->count(4)->create();

//        Teacher::factory()->count(2)
//            ->hasAttached(School::all()->random())
//            ->hasAttached(School::all()->random())
//            ->create();

//        Subject::factory()->count(1)
//            ->hasAttached(Teacher::all()->random())
//            ->hasAttached(Teacher::all()->random())
//            ->hasAttached(Teacher::all()->random())
//            ->create();

//        Student::factory()->count(10)
//            ->for(School::all()->random())
//            ->hasAttached(Subject::all()->random())
//            ->hasAttached(Subject::all()->random())
//            ->hasAttached(Subject::all()->random())
//            ->hasAttached(Subject::all()->random())
//            ->hasAttached(Subject::all()->random())
//            ->create();
    }
}
