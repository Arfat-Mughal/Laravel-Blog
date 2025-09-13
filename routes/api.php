<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorsController;
use App\Http\Controllers\API\PostsController;
use App\Http\Controllers\API\CategoriesController;

Route::get('authors/{author}', [AuthorsController::class, '__invoke'])->name('api.author');

Route::resource('posts', PostsController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'api.posts.index',
        'show' => 'api.posts.show',
    ]);

Route::resource('categories', CategoriesController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'api.categories.index',
        'show' => 'api.categories.show',
    ]);
