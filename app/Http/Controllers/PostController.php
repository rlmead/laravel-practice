<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($post)
    {
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
    }
}
