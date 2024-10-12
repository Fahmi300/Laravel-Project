<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category_country;
use App\Models\Category_news;
use App\Models\News;
use App\Models\News_category;
use App\Models\News_country;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Saved;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Category_country::factory()->create();
        $this->call([UserSeeder::class,
                    Category_countrySeeder::class,
                    Category_newsSeeder::class,
                    NewsSeeder::class,
                    News_categorySeeder::class,
                    News_countrySeeder::class,
                    CommentSeeder::class,
                    SavedSeeder::class,
                    LikeSeeder::class]);
            
    }
}
