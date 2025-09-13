<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UsersPasswordController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UserPanelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'domain' => 'admin.' . config('app.url'),
    'as' => 'admin.'
], function () {
    // Language
    Route::get('/set-lang/{lang}', [AdminController::class, 'setLang'])->name('set-lang');

    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/', [AdminController::class, 'index'])->name('index');

        // File Manager
        Route::get('/files-manager', [AdminController::class, 'filesManager'])->name('files-manager');

        Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });

        // Posts
        Route::put('/posts/{post}/image', [PostsController::class, 'updateImage'])->name('posts.image.update');
        Route::delete('/posts/{post}/image', [PostsController::class, 'destroyImage'])->name('posts.image.destroy');
        Route::resource('posts', PostsController::class)->except('show');

        // Post Content
        Route::delete('/post-content/{postContent}', [ContentController::class, 'deletePostContent'])->name('post-content.destroy');

        // Admin-only routes
        Route::middleware('role:admin')->group(function () {
            // Content
            Route::delete('/content/{content}', [ContentController::class, 'deleteCategoryContent'])->name('content.destroy');

            // Users
            Route::put('/users/{user}/image', [UsersController::class, 'updateImage'])->name('users.image.update');
            Route::delete('/users/{user}/image', [UsersController::class, 'destroyImage'])->name('users.image.destroy');
            Route::put('/users/{user}/password', [UsersPasswordController::class, 'update'])->name('users.password');
            Route::resource('users', UsersController::class)->except('show');

            // Categories
            Route::put('/categories/{category}/image', [CategoriesController::class, 'updateImage'])->name('categories.image.update');
            Route::delete('/categories/{category}/image', [CategoriesController::class, 'destroyImage'])->name('categories.image.destroy');
            Route::resource('categories', CategoriesController::class)->except('show');
        });

        // User Panel
        Route::group([
            'as' => 'user-panel.',
            'prefix' => 'user-panel'
        ], function () {
            Route::get('/', [UserPanelController::class, 'index'])->name('index');
            Route::put('/', [UserPanelController::class, 'update'])->name('update');
            Route::put('/password', [UserPanelController::class, 'updatePassword'])->name('password');
            Route::put('/image', [UserPanelController::class, 'updateImage'])->name('image.update');
            Route::delete('/image', [UserPanelController::class, 'destroyImage'])->name('image.destroy');
        });
    });
});
