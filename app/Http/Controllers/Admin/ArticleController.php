<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view("admin.article.index", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.article.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "title" => "required|max:255",
            "slug" => "required|max:255",
            "content" => "required",
            "categories" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,,avif|max:2048",
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->image = $request->image;
        $article->content = $request->content;
        // $article->views = $request->views;
        // $article->status = $request->status;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if($file){
           $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move('images', $file_name);
              $article->image = "images/$file_name";
        }
        $article->save();
        $article->categories()->attach($request->categories)    ;


        toast('Article created successfully!', 'success');



        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view("admin.article.edit", compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|max:50",
            "email" => "required|email",
            "phone" => "required|digits_between:10,14",
            "logo" => "nullable|image|mimes:jpeg,png,jpg,,avif|max:2048",
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->image = $request->image;
        $article->content = $request->content;
        $article->views = $request->views;
        $article->status = $request->status;
        $article->meta_keywords = $request->meta_keywords;
        $article->meta_description = $request->meta_description;
        $file = $request->image;
        if($file){
            if($article->image){
                unlink($article->image);
            }
           $file_name = time().'.'.$file->getClientOriginalExtension();
              $file->move('images', $file_name);
              $article->image = "images/$file_name";
        }
        toast('Article updated successfully!', 'success');
        $article->save();
         return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        if($article->image){
            unlink($article->image);
        }
        $article->delete();
        toast('Article deleted successfully!', 'success');
        return redirect()->route('admin.article.index');
    }
}
