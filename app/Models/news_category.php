<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'news_id', 
        'category_news_id'
    ];
}
