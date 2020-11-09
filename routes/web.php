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

Route::get('/posts/{post}', function ($post) {
    $all_posts = [
        '1' => 'post one',
        '2' => 'post two'
    ];

    if (! array_key_exists($post, $all_posts)) {
        abort(404, 'NO SUCH POST');
    }

    return view('post', [
        'post' => $all_posts[$post]
    ]);
});
