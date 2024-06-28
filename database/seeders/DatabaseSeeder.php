<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            DisciplineSeeder::class,
            TopicSeeder::class,
            TestSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            ResultSeeder::class,
            MaterialSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
