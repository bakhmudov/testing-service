<?php

namespace Database\Factories;

use App\Models\Result;
use App\Models\Test;
use App\Models\User;
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
            'test_id' => Test::factory(),
            'user_id' => User::factory(),
            'score' => $this->faker->numberBetween(0, 100),
            'completed_at' => $this->faker->dateTime,
        ];
    }
}
