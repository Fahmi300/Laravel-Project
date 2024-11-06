<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_country extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id', 
        'category_countries_id'
    ];
}
