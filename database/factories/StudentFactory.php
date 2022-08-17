<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'birth_date' => $this->faker->date('Y-m-d'),
            'class_year' => $this->faker->numberBetween(1,12),
            'school_id' => School::factory()
        ];
    }
}
