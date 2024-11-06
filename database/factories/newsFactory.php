<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\news>
 */
class newsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'news_title' => fake()->sentence(),
            'users_id' => User::inRandomOrder()->first()->id,
            'content' => fake()->paragraphs(15, true),
            'image' => fake()->imageUrl(),
            'slug' =>Str::slug(fake()->sentence()),
        ];
    }
}
