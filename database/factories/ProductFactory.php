<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'item_code' => $this->faker->unique()->word(),
            // 'description' => $this->faker->text(),
            // 'unit_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'item_code' => 'IC-1000'.rand(1, 1000),
            'description' => 'Name of Product'.rand(10, 500),
            'unit_price' => mt_rand(100, 1000),
        ];
    }
}
