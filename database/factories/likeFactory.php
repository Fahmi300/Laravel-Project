<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class likeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => User::inRandomOrder()->first()->id,
            'news_id' => News::inRandomOrder()->first()->id,
            'date' => now(),
        ];
    }
}
