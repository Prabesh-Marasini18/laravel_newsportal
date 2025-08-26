<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.category.index", compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:50",
            "slug" => "required|max:50|",


        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;

        $category->save();
        toast('Category created successfully!', 'success');



        return redirect()->route('admin.category.create');
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
        $category = Category::findOrFail($id);
        return view("admin.category.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "required|max:50",
            "slug" => "required|max:50|",
        ]);

        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->slug = $request->slug;


        toast('Category updated successfully!', 'success');
        $category->save();
         return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
        toast('Category deleted successfully!', 'success');
        return redirect()->route('admin.category.index');
    }
}
