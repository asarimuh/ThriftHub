<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductImage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
 

public function definition(): array
{
    return [
        'product_id' => Product::factory(),
        'image_path' => 'products/placeholder.jpg',
        'is_primary' => true,
        'sort_order' => 1,
    ];
}
}
