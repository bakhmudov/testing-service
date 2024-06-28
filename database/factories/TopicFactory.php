<?php

namespace Database\Factories;

use App\Models\Discipline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'discipline_id' => Discipline::factory(),
            'name' => $this->faker->word,
        ];
    }
}
