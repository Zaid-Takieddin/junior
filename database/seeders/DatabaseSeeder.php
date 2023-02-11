<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TeacherCertificate;
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
            // TeacherSeeder::class,
            GuardianSeeder::class,
            // ClassroomSeeder::class,
            ChildSeeder::class,
            BusLineSeeder::class,
            OrderSeeder::class,
            FoodSeeder::class,
            ReportSeeder::class,
            TeacherCertificateSeeder::class
        ]);
    }
}
