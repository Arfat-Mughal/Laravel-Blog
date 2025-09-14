<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;

Route::feeds();

Route::get('/', [AppController::class, 'start']);

Route::group([
    'prefix' => '{lang}',
    'middleware' => 'setlang',
    'where' => ['lang' => '[a-zA-Z]{2}'],
    'domain' => config('app.url'),
], function () {
    Route::get('/', [AppController::class, 'index'])->name('index');
    Route::get('/about', [AppController::class, 'about'])->name('about');
    Route::get('/privacy-policy', [AppController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/contact', [AppController::class, 'contact'])->name('contact');
    Route::post('/contact', [AppController::class, 'store'])->name('contact.store');

    Route::get('/faq', [AppController::class, 'faq'])->name('faq');
    Route::get('/terms', [AppController::class, 'terms'])->name('terms');
    Route::get('/help', [AppController::class, 'help'])->name('help');

    // Invokable controller
    Route::get('/authors/{author}', AuthorsController::class)->name('author');

    // Resource controllers (only index + show)
    Route::resource('posts', PostsController::class)->only(['index', 'show']);
    Route::resource('categories', CategoriesController::class)->only(['index', 'show']);
});
