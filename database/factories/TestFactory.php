<?php

namespace Database\Factories;

use App\Models\Discipline;
use App\Models\Test;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    protected $model = Test::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'topic_id' => Topic::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'total_time' => $this->faker->numberBetween(30, 120), // время в минутах
        ];
    }
}
