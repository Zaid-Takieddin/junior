<?php

namespace Database\Factories;

use App\Models\ChildParent;
use App\Models\Classroom;
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
            'child_parent_id' => ChildParent::factory(),
            'classroom_id' => Classroom::factory(),
            'first_name' => $this->faker->firstName(),
            'status' => $this->faker->randomElement(['S', 'B', 'H']),
            'birth_date' => $this->faker->date()
        ];
    }
}
