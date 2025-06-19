<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
