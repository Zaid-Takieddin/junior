<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'child_id' => Child::factory(),
            'reporter' => Teacher::factory(),
            'description' => $this->faker->text()
        ];
    }
}
