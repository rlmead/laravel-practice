<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        // dd(request()->all()); //works as expected
        $article = new Article();
        
        // had issues using validate_article for the template here
        $article->user_id = 13;
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        
        $article->save();
        
        $article->tags()->attach(request('tags')); // must happen after article is saved (doesn't get added to article object - updates article_tag table)

        // less secure (must reset $guarded in Article.php)
        // Article::create(request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required',
        // ]));

        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $this->validateArticle();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect($article->path());
    }

    protected function validateArticle() 
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'tags' => 'exists:tags,id'
        ]);
    }

}
