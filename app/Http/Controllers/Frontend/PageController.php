<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{

    public function __construct()
    {
        $company = Company::first();
        $categories = Category::all();
            View::share([
                'company' => $company,
                'categories' => $categories
            ]);


    }
    public function home()
    {
        $latest_article = Article::latest()->latest()->first();
        $latest_articles = Article::latest()->skip(1)->limit(2)->get();
        $trending_articles = Article::orderBy('views', 'desc')->take(5)->get();
        return view('frontend.home', compact('latest_article', 'latest_articles', 'trending_articles'));
    }

    public function category($slug)
    {

        $category = Category::where('slug', $slug)->first();
        return view('frontend.category', compact('category'));
    }

    public function article($slug)
    {

        $article = Article::where('slug', $slug)->first();
        $data = Cookie::get("$slug");
        if(!$data){
            $article->increment('views');
            $cookie= Cookie::queue("$slug", "true");
        }
        return view('frontend.article', compact('article'));
    }

}
