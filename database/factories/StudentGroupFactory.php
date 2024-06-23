<?php

namespace Database\Factories;

use App\Models\StudentGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentGroup>
 */
class StudentGroupFactory extends Factory
{
    protected $model = StudentGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_number' => $this->faker->unique()->numberBetween(100, 999),
            'leader' => $this->faker->name,
        ];
    }
}
