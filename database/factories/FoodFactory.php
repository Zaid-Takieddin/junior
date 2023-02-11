<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['meal', 'drink']);
        $images = '';

        if ($type === 'meal') {
            $images =  $this->faker->randomElement(['https://realfood.tesco.com/media/images/RFO-Main-472x310-QuinoaNuggets-fc2ba00e-5587-4075-923c-363a93024094-0-472x310.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN4DfN3QXf9zTXx9cigkZfl8K1kcX74oWWwq9ReO4KbDOCL3MfWsmOwtpkD7vN3WXPeAI&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuif3zv_toPxMGoEYD8le63K-Thc55RuP01w&usqp=CAU']);
        } else {
            $images = $this->faker->randomElement(['https://d2v6hcajofki8b.cloudfront.net/dras34d35/image/upload/c_fit,h_150,q_100,w_150/uvfr1a6y5tzdib9eg0pc.png', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUg7fqfgs-J9t_k-_oXhEGhs269YssAUoyiy6zpNUzYEjJgbW8L6cE4NHM7bMqEinUO9k&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXH9mT8Fvtn-yHmlIwaUyDUz13NjRUh3nUDA&usqp=CAU']);
        }

        return [
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(700, 20500),
            'type' => $type,
            'image' => $images,
        ];
    }
}
