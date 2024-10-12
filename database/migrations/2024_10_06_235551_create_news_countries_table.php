<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news_countries', function (Blueprint $table) {
            $table->foreignId('news_id')->constrained(
                table: 'news', indexName: 'news_category_country_id'
            )->OnDelete('cascade');
            $table->foreignId('category_countries_id')->constrained(
                table: 'category_countries', indexName: 'category_countries_news_id'
            )->OnDelete('cascade');
            $table->primary(['news_id', 'category_countries_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_countries');
    }
};
