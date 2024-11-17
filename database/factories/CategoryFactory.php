<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Daftar kategori e-commerce yang umum
        $categories = [
            'Electronics',
            'Fashion',
            'Book',
            'Beauty & Health',
            'Sports & Outdoors',
            'Toys & Hobbies',
            'Automotive',
            'Books',
            'Groceries',
            'Office Supplies'
        ];

        // Ambil kategori secara acak
        $categoryName = $this->faker->unique()->randomElement($categories);

        // Ambil kata pertama dari nama kategori
        $firstWord = strtolower(strtok($categoryName, ' ')) . '.jpg';

        return [
            'name' => $categoryName,
            'description' => $this->faker->sentence,
            'photo' => 'category_photos/' . $firstWord,
        ];
    }
}
