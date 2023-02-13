<?php

namespace Database\Seeders;

use App\Models\ChildImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildImage::factory()
            ->count(10)
            ->create();
    }
}
