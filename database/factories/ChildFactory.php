<?php

namespace Database\Factories;

use App\Models\BusLine;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'guardian_id' => Guardian::factory(),
            'classroom_id' => Classroom::factory(),
            'bus_line_id' => BusLine::factory(),
            'first_name' => $this->faker->firstName(),
            'status' => $this->faker->randomElement(['S', 'B', 'H']),
            'birth_date' => $this->faker->date(),
        ];
    }
}
