<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News_country;

class News_countrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $newsCountries = News_country::factory()->count(60)->make();

        // foreach ($newsCountries as $newsCountry) {
        // // Use firstOrCreate to avoid duplicates
        //     News_country::firstOrCreate([
        //         'news_id' => $newsCountry->news_id,
        //         'category_countries_id' => $newsCountry->category_countries_id,
        //     ]);
        // }
    }   
}