<?php

namespace Database\Factories;

use App\Models\Category;
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
            'title' => $this->faker->words(3, true),
            'slug' => $this->faker->unique()->slug(),
            'product_url' => $this->faker->url(),
            'rating' => $this->faker->numberBetween(1, 5), // Misalnya rating antara 1-5
            'description' => $this->faker->paragraph(),
            'category_id' => Category::First()->id,
            'price' => $this->faker->randomFloat(2, 10, 1000), // Misalnya harga antara 10-1000 dengan 2 desimal
        ];
    }
}