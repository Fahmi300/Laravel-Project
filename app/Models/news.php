<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class news extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'news_title', 'users_id', 'content', 'image', 'slug',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category_news(): BelongsToMany
    {
        return $this->belongsToMany(Category_news::class, 'news_categories');
    }

    public function category_countries(): BelongsToMany
    {
        return $this->belongsToMany(Category_country::class, 'news_countries', 'news_id', 'category_countries_id');
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

    public function scopeSearching(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, 
            fn ($query, $search) =>
            $query->where('news_title', 'like', '%' . request('search') . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category_news', fn($query) => $query->where('name',
            $category))
        );

    }
}
