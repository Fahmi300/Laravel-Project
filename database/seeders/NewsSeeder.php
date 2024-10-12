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
        
    }
}


