<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected static ?int $i = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static::$i++;
        if (static::$i > 10) static::$i = 1;

        return [
            'name' => fake()->company(),
            'description' =>  fake()->paragraph(),
            'category' => fake()->randomElement(['makanan', 'minuman']),
            'price' => fake()->randomNumber(5, true),
            'rating' => fake()->randomFloat(1, 0, 5),
            'status' => fake()->randomElement(['tersedia', 'habis']),
            'photo' => 'product_photos/food-' . static::$i . '.jpg',
        ];
    }
}
