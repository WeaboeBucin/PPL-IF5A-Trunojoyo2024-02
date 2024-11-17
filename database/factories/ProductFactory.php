<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'price' => $this->faker->numberBetween(10000, 100000),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'status' => $this->faker->randomElement(['tersedia', 'habis']),
            'photo' => 'product_photos/food-' . static::$i . '.jpg',
        ];
    }
}
