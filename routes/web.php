<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/* Seccion de E-Commerce */

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

/* Seccion del blog */
Route::resource('articles', ArticleController::class);
Route::resource('blog-categories', BlogCategoryController::class);
Route::resource('commets', CommentController::class)->except(['index','create','show']);

/* Cambio de idioma */
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language.switch');

