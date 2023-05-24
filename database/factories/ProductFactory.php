<?php

namespace Database\Factories;

use App\Enums\DiskName;
use App\Enums\ProductMediaCollection;
use App\Models\Product;
use App\Models\Variation;
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
            'user_id' => 1, // admin
            'title' => $this->faker->title,
            'brief_content' => $this->faker->sentence,
            'content' => $this->faker->text,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $image = $this->faker->image(public_path('uploads/products'), 100, 100);
            $product->addMedia($image)->toMediaCollection(ProductMediaCollection::DEFAULT, DiskName::PRODUCTS);
            Variation::factory()->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
