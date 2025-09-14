<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorsController;
use App\Http\Controllers\API\ArticlesController;
use App\Http\Controllers\API\CategoriesController;

Route::get('authors/{author}', [AuthorsController::class, '__invoke'])->name('api.author');

Route::resource('articles', ArticlesController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'api.articles.index',
        'show' => 'api.articles.show',
    ]);

Route::resource('categories', CategoriesController::class)
    ->only(['index', 'show'])
    ->names([
        'index' => 'api.categories.index',
        'show' => 'api.categories.show',
    ]);
