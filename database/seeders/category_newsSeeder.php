<?php

namespace Database\Seeders;

use App\Models\Category_news;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class category_newsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category_news::factory()->count(16)->create();
    }
}
