<?php

namespace Database\Seeders;

use App\Models\Child;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Child::factory()
            ->count(10)
            ->forGuardian()
            ->forClassroom()
            ->hasImage()
            ->hasOrders(1)
            ->hasReports(3)
            ->create();
    }
}
