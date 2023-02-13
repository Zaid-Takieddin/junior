<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TeacherSeeder::class,
            GuardianSeeder::class,
            HomeworkSeeder::class,
            ClassroomSeeder::class,
            ChildSeeder::class,
            BusLineSeeder::class,
            FoodSeeder::class,
            OrderSeeder::class,
            ReportSeeder::class,
            TeacherCertificateSeeder::class,
            ChildImageSeeder::class,
            LineSupervisorSeeder::class,
            // HomeworkAnswerSeeder::class
        ]);
    }
}
