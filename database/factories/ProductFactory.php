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
    // database/factories/ProductFactory.php

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->words(3, true),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(20000, 300000),
            'condition' => $this->faker->randomElement(['new', 'like_new', 'used']),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL', 'XLL', 'XXL']),
            'brand' => $this->faker->optional(0.7)->company(),
            'stock' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['draft', 'active', 'sold']),
        ];
    }
}
