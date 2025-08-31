<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
// use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [PageController::class, "home"])->name("home");
Route::get("/category/{slug}", [PageController::class, "category"])->name("category");
Route::get("/article/{slug}", [PageController::class, 'article'])->name('article');





Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

      Route::resource("admin/companies", CompanyController::class)->names("admin.company");
      Route::resource("admin/category", CategoryController::class)->names("admin.category");
      Route::resource("admin/article", ArticleController::class)->names('admin.article');

});




require __DIR__.'/auth.php';
