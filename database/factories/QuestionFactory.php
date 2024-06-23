<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'test_id' => Test::factory(),
            'content' => $this->faker->paragraph,
            'question_type' => $this->faker->word,
            'answers' => json_encode([$this->faker->word, $this->faker->word, $this->faker->word]),
            'correct_answers' => json_encode([$this->faker->word]),
            'explanation' => $this->faker->paragraph,
            'points' => $this->faker->numberBetween(1, 10),
        ];
    }
}
