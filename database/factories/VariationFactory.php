<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variation>
 */
class VariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'product_id', auto
            'stock' => $this->faker->numberBetween(0, 100),
            'max_order' => $this->faker->numberBetween(0, 50),
            'sku' => $this->faker->word,
            'price' => $this->faker->numberBetween(1000, 1000000),
            'sale_price' => $this->faker->numberBetween(500, 50000000),
        ];
    }
}
