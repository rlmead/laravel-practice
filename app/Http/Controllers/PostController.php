<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        // $all_posts = [
        //     '1' => 'post one',
        //     '2' => 'post two'
        // ];

        $post = \DB::table('posts')->where('slug', $slug)->first();
        
        return view('post', [
            'post' => $post
        ]);
    }
}
