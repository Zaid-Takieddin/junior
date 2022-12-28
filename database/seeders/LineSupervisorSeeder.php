<?php

namespace Database\Seeders;

use App\Models\LineSupervisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LineSupervisor::factory()
            ->count(10)
            ->create();
    }
}
