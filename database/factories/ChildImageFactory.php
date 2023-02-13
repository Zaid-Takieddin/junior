<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChildImage>
 */
class ChildImageFactory extends Factory
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
            'image' => $this->faker->randomElement(['https://upload.wikimedia.org/wikipedia/commons/3/3d/5-year-old_girl_showing_scar_from_infantile_facial_reconstruction_surgery.jpg', 'https://www.shutterstock.com/image-photo/boy-portrait-on-sunny-day-260nw-424809505.jpg', 'https://previews.123rf.com/images/ecapoferri/ecapoferri1801/ecapoferri180100524/94713401-portrait-of-4-year-old-boy-smiling-in-exterior-on-shores-of-lake.jpg', 'https://previews.123rf.com/images/mariis/mariis1805/mariis180500179/102150003-dark-haired-boy-4-years-old-is-smiling-in-a-forest.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStTdXUWxP5-hBcFkCKFPm8YcYmOJHntOWsTA&usqp=CAU'])
        ];
    }
}
