<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category_news;
use App\Models\Category_country;
use App\Models\User;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch random category news and category country
        News::factory()->count(40)->create();

        foreach (News::all() as $news) {
            $category_news = Category_news::inRandomOrder()->take(rand(1,3))->pluck('id');
            $news->category_news()->attach($category_news); 
        }

        foreach (News::all() as $news) {
            $category_countries = Category_country::inRandomOrder()->take(rand(1,3))->pluck('id');
            $news->category_countries()->attach($category_countries); 
        }
        
    }
}


