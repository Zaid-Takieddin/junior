<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::factory()
            // ->hasChildren(8)
            // ->hasHomeworks(1)
            ->count(10)
            ->forTeacher()
            ->create();
    }
}
