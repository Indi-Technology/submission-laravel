<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
    // if you don’t put with() here, you will have N+1 query performance problem
    $posts = Post::with('category', 'tags')->take(5)->latest()->get();

    return view('dashboard', compact('posts'));
})->name('dashboard');

Route::get('detail/{id}', [PostController::class, 'detail'])->name('pages.detail');

Route::get('post', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('dashboard', [PostController::class, 'dashboard'])->name('dashboard');

Route::get('add', [PostController::class, 'add'])->name('admin.posts.add');
Route::post('add/post', [PostController::class, 'store'])->name('add.posts.store');

Route::get('category', [CategoryController::class, 'add'])->name('admin.categories.add');
Route::post('add/category', [CategoryController::class, 'store'])->name('add.categories.store');

Route::get('tag', [TagController::class, 'add'])->name('admin.tags.add');
Route::post('add/tag', [TagController::class, 'store'])->name('add.tags.store');

Route::view('about', 'pages.about')->name('pages.about');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('tags', AdminTagController::class);
    Route::resource('posts', AdminPostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
