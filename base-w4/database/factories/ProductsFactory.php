<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['regular', 'digital']),
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(1),
            'unit_price' => $this->faker->randomFloat(2, 0, 1000),
            'is_visible' => $this->faker->boolean,
        ];
    }
}
