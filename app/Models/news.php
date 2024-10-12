<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class news extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id', 'news_title', 'content', 'image', 'date', 'slug',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category_news(): BelongsToMany
    {
        return $this->belongsToMany(Category_news::class);
    }

    public function category_countries(): BelongsToMany
    {
        return $this->belongsToMany(Category_country::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Likes::class);
    }

    public function saveds(): HasMany
    {
        return $this->hasMany(Saveds::class);
    }
}
