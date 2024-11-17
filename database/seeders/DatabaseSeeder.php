<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 25 admin users
        Admin::factory(5)->create();
        Category::factory()->count(10)->create();

        // Create 25 merchants and users, each with related products, favorites, comments, and chats
        for ($i = 1; $i <= 25; $i++) {
            // Create a merchant
            $merchant = Merchant::factory()->create();

            // Create a user
            $user = User::factory()->create();

            // Create a product for the merchant
            Product::factory()->create(['merchant_id' => $merchant->id]);

            // Create a favorite for the user
            Favorite::factory()->create(['user_id' => $user->id, 'product_id' => $i]);

            // Create a comment for the user
            Comment::factory()->create(['user_id' => $user->id, 'product_id' => $i]);

            // Create a chat (using the new ChatFactory setup)
            Chat::factory()->create(['sender_id' => $user->id, 'sender_type' => User::class]);
        }
    }
}
