<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Question;
use App\Models\Result;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\Test;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);

        // Создаем группы студентов и заполняем их студентами
        StudentGroup::factory(10)->create()->each(function ($group) {
            Student::factory(10)->create(['group_id' => $group->id]);
        });

        // Создаем дисциплины, тесты, вопросы и результаты
        Discipline::factory(10)->create()->each(function ($discipline) {
            Test::factory(5)->create(['discipline_id' => $discipline->id])->each(function ($test) {
                Question::factory(10)->create(['test_id' => $test->id]);
                Result::factory(5)->create(['test_id' => $test->id, 'student_id' => Student::inRandomOrder()->first()->id]);
            });
        });
    }
}
