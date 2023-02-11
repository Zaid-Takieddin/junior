<?php

namespace Database\Seeders;

use App\Models\TeacherCertificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherCertificate::factory()->count(25)->create();
    }
}
