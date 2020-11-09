<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Post;

class PostController extends Controller
{
    public function show($slug)
    {
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
