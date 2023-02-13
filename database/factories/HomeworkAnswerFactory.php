<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\HomeworkAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeworkAnswers>
 */
class HomeworkAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'homework_id' => HomeworkAnswer::factory(),
            'child_id' => Child::factory(),
            // 'answer' => $this->faker->file('docs', 'site', true)
        ];
    }
}
