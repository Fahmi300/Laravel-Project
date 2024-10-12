<?php

namespace Database\Seeders;

use App\Models\News_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class News_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsCategories = News_category::factory()->count(20)->make();

        foreach ($newsCategories as $newsCategory) {
        // Use firstOrCreate to avoid duplicates
        News_category::firstOrCreate([
            'news_id' => $newsCategory->news_id,
            'category_news_id' => $newsCategory->category_news_id,
        ]);
    }
    }
}
