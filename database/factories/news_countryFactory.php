<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category_country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\news_country>
 */
class news_countryFactory extends Factory
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
            'category_countries_id' => Category_country::inRandomOrder()->first()->id,
        ];
    }
}
