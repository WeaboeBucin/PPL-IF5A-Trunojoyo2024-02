<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\User;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $senderType = $this->faker->randomElement(['App\Models\User', 'App\Models\Merchant']);
        $senderId = null;

        if ($senderType === 'App\Models\User') {
            $senderId = User::factory()->create()->id;
        } elseif ($senderType === 'App\Models\Merchant') {
            $senderId = Merchant::factory()->create()->id;
        }

        return [
            'body' => $this->faker->sentence(),
            'sender_id' => $senderId,
            'sender_type' => $senderType,
        ];
    }
}
