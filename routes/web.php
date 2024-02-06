<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('user.about');
});

Route::prefix('public')->group(function () {
    Route::get('/blog', [UserController::class, 'index'])->name('blog');
    Route::get('/about', [UserController::class, 'about'])->name('about');
    Route::get('/blog/view/{id}', [UserController::class, 'view'])->name('view');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [ArticleController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('articles', ArticleController::class);
        Route::resource('categories', CategoryController::class);
        Route::get('/{id}/view', [ArticleController::class, 'articleView'])->name('articles.view');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
