<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test', [
        'name' => request('name')
    ]);
});

use App\Http\Controllers\PostController;
Route::get('posts/{post}', [PostController::class, 'show']);

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/about', function() {
    return view('about', [
    'articles' => App\Models\Article::take(3)->latest()->get()
    ]);
});

use App\Http\Controllers\ArticlesController;
Route::get('articles/{article}', [ArticlesController::class, 'show']);
