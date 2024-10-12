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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained(
                table: 'news', indexName: 'news_likes_id'
            )->OnDelete('cascade');
            $table->foreignId('users_id')->constrained(
                table: 'users', indexName: 'users_likes_id'
            )->OnDelete('cascade');
            $table->timestamp('date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
