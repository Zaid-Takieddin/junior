<?php

namespace Database\Seeders;

use App\Models\Homework;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homework::factory()
            ->count(1)
            ->forClassroom()
            ->hasAnswers(1)
            ->create();
    }
}
