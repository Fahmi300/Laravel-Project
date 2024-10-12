<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category_news;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\news_category>
 */
class news_categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'news_id' => News::inRandomOrder()->first()->id,
            'category_news_id' => Category_news::inRandomOrder()->first()->id,
        ];
    }
}
