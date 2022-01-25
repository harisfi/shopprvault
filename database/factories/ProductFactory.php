<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(1, 500000),
            'picture' => $this->faker->image(),
            'rating' => $this->faker->numberBetween(3, 5),
            'qty' => $this->faker->numberBetween(1, 50)
        ];
    }
}
