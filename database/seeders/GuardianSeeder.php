<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guardian::factory()
            ->hasChildren(3)
            ->create();

        Guardian::factory()
            ->hasChildren(2)
            ->create();

        Guardian::factory()
            ->hasChildren(1)
            ->create();
    }
}
