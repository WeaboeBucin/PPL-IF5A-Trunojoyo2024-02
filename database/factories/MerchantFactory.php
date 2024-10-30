<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    protected static ?int $i = 0;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

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
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'description' =>  fake()->paragraph(),
            'address' => fake()->address(),
            'type' => fake()->randomElement(['Cafe', 'Lapak Mahasiswa', 'Pedagang Keliling', 'UMKM', 'Warung Makan']),
            'owner' => fake()->name(),
            'logo' => 'logo/logo-' . static::$i . '.jpg',
            'cover' => 'cover/cover-' . static::$i . '.jpg',
            'latitude' => -6.200000, // Koordinat Contoh
            'longitude' => 106.816666, // Koordinat Contoh
        ];
    }
}
