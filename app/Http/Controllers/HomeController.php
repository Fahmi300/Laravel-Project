<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Category_news;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::all();
        $newsLat = News::latest()->take(7)->get();
        $newspop = News::leftJoin('likes', 'likes.news_id', '=', 'news.id')
                        ->select('news.*', \DB::raw('COUNT(DISTINCT likes.id) as total_like'))
                        ->groupBy('news.id','news.users_id', 'news.news_title', 'news.content', 'news.image', 'news.slug','news.created_at', 'news.updated_at')
                        ->orderBy('total_like','DESC')
                        ->take(5)
                        ->get();
                                        
        $users = User::all();
        $category_news = Category_news::all(); 

        return view('home', compact('news','newsLat','newspop', 'users', 'category_news'));
    }
}
