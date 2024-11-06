<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\News_category;
use App\Models\News_country;
use App\Models\Category_news;
use App\Models\Category_country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {  

        $news = News::searching(request(['search', 'category']))->latest()->paginate(8);

        return view('news', compact('news'));
    }

    public function single(News $news)
    {

        return view('singlenews', compact('news'));
    }

    public function makenews()
    {
        $category_news = Category_news::all();
        $category_country = Category_country::all();

        return view('makenews', compact('category_news','category_country'));
    }

    public function actionmakenews(Request $request)
    {

        $imagePath = $request->file('image')->store('image', 'public');


        $news = News::create([
            'news_title' => $request->title,
            'users_id' => Auth::id(),
            'content' => $request->content,
            'image' => $imagePath,
            'slug' => Str::slug($request->title),
        ]);

        foreach ($request->categories as $cat) {
            $category_news = News_category::create([
                'news_id' => $news->id,
                'category_news_id' => $cat,
            ]);
        }

        return redirect('/profile');
    }

    public function actiondeletenews(Request $request)
    {
        
        $new = News::findOrFail($request->id);
        $new->delete();

        return redirect('/profile');
    }

}
