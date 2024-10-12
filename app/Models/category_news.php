<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_news extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_categories');
    }
}
