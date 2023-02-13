<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Homework>
 */
class HomeworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'classroom_id' => Classroom::factory(),
            'name' => $this->faker->unique()->title(),
            'description' => $this->faker->text(),
            'expiration' => $this->faker->date(),
            // 'attachment' => $this->faker->file('/', '/', true)
        ];
    }
}
