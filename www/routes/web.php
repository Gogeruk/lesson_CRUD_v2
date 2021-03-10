<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;

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


// вывод всех постов
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', [\App\Http\Controllers\WelcomeController::class, 'welcome'])->name('home');

// вывод постов конкретного автора (user);
Route::get('/author/{author}', [\App\Http\Controllers\AuthorController::class, 'author'])->name('posts_of_an_author');

// вывод постов конкретной категории;
Route::get('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'categoryCheck'])->name('posts_of_a_category');

// вывод постов по конкретному тегу;
Route::get('/tag/{tag}', [\App\Http\Controllers\TagController::class, 'tagCheck'])->name('posts_of_a_tag');

// вывод постов конкретной категории, определённого автора;
Route::get('/author/{author}/category/{category}', [\App\Http\Controllers\AuthorController::class, 'author_category'])->name('posts_of_an_author_and_a_category');

// вывод постов конкретной категории, определённого автора, заданного тега.
Route::get('/author/{author}/category/{category}/tag/{tag}', [\App\Http\Controllers\AuthorController::class, 'author_category_tag'])->name('posts_of_an_author_and_a_category_and_a_tag');

// list categories
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'categoryAll'])->name('list-all-categories');

// list tags
Route::get('/tags', [\App\Http\Controllers\TagController::class, 'tagAll'])->name('list-all-tags');


Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, 'loginProcess'])->name('loginProcess');
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    //////  CRUD //////
    // Create a new post.
    Route::get('/post/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create_a_new_post');
    Route::post('/post/create', [\App\Http\Controllers\PostController::class, 'createSave'])->name('create_a_new_post_save');

    Route::get('/post/{post}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('update_a_post');
    Route::post('/post/{post}/update', [\App\Http\Controllers\PostController::class, 'updateSave'])->name('update_a_post_save');

    Route::get('/post/{post}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('delete_a_post');

    // Create a new category.
    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('create_a_new_category');
    Route::post('/categories/create', [\App\Http\Controllers\CategoryController::class, 'createSave'])->name('create_a_new_category_save');

    Route::get('/categories/{category}/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('update_a_category');
    Route::post('/categories/{category}/update', [\App\Http\Controllers\CategoryController::class, 'updateSave'])->name('update_a_category_save');

    Route::get('/categories/{category}/delete', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('delete_a_category');

    // Create a new tag.
    Route::get('/tags/create', [\App\Http\Controllers\TagController::class, 'create'])->name('create_a_new_tag');
    Route::post('/tags/create', [\App\Http\Controllers\TagController::class, 'createSave'])->name('create_a_new_tag_save');

    Route::get('/tags/{tag}/update', [\App\Http\Controllers\TagController::class, 'update'])->name('update_a_tag');
    Route::post('/tags/{tag}/update', [\App\Http\Controllers\TagController::class, 'updateSave'])->name('update_a_tag_save');

    Route::get('/tags/{tag}/delete', [\App\Http\Controllers\TagController::class, 'delete'])->name('delete_a_tag');
    ////// END CRUD //////
});
