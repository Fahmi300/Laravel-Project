<?php

namespace Database\Seeders;

use App\Models\Category_country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class category_countrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category_country::factory()->count(30)->create();
    }
}
