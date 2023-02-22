<?php

namespace Database\Seeders;

use App\Models\BusLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusLine::factory()
            ->count(10)
            ->forLineSupervisor()
            ->hasChildren(8)
            ->create();
    }
}
