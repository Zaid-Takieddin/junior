<?php

namespace Database\Seeders;

use App\Models\Child;
use App\Models\ChildParent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildParent::factory()
            ->count(25)
            ->hasChildren(1)
            ->create();

        ChildParent::factory()
            ->count(12)
            ->hasChildren(2)
            ->create();

        ChildParent::factory()
            ->count(10)
            ->hasChildren(3)
            ->create();
    }
}
