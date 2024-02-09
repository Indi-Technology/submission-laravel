<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'homepage'])->name('homepage');
Route::get('/details/{id}', [ArticleController::class, 'detail']);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class)->names([
        'index' => 'categories',
        'create' => 'categories.create_categories',
        'store' => 'categories.store_categories',
        'edit' => 'categories.edit_categories',
        'update' => 'categories.update_categories',
        'destroy' => 'categories.destroy_categories',
    ])->except(['show']);

    Route::resource('tags', TagController::class)->names([
        'index' => 'tags',
        'create' => 'tags.create_tags',
        'store' => 'tags.store_tags',
        'edit' => 'tags.edit_tags',
        'update' => 'tags.update_tags',
        'destroy' => 'tags.destroy_tags',
    ])->except(['show']);

    Route::resource('articles', ArticleController::class)->names([
        'index' => 'articles',
        'create' => 'articles.create_articles',
        'store' => 'articles.store_articles',
        'edit' => 'articles.edit_articles',
        'update' => 'articles.update_articles',
        'destroy' => 'articles.destroy_articles',
    ])->except(['show']);
});

require __DIR__ . '/auth.php';
