<?php

namespace Database\Factories;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'phone' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'dni' => fake()->unique()->regexify('\d{8}[trwagmyfpdxbnjzsqvhicke]'),
            'city' => fake()->city(),
            'course_id' => fake()->randomNumber(1, 100)
        ];
    }
}
