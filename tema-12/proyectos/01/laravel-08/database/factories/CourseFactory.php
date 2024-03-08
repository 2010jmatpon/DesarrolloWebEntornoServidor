<?php

namespace Database\Factories;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Course::class;
    public function definition(): array
    {
        return [
            //
            'course'=>fake()->randomElement(['1DAW', '2DAW', '1SMR', '2SMR', '1AD', '2AD', '1ASIR', '2ASIR']),
            'ciclo'=>fake()->randomElement(['DAW', 'SMR', 'AD', 'ASIR'])
        ];
    }
}
