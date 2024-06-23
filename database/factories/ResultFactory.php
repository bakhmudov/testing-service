<?php

namespace Database\Factories;

use App\Models\Result;
use App\Models\Student;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    protected $model = Result::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'test_id' => Test::factory(),
            'completion_time' => $this->faker->numberBetween(1, 30),
            'correct_answers' => $this->faker->numberBetween(1, 10),
            'total_points' => $this->faker->numberBetween(1, 100),
        ];
    }
}
