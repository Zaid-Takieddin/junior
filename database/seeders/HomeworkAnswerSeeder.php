<?php

namespace Database\Seeders;

use App\Models\HomeworkAnswer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeworkAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeworkAnswer::factory()
            ->count(1)
            ->forHomework()
            ->forChild()
            ->create();
    }
}
