<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * display a list of the resource
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::orderBy('published_at', 'desc')->get()
        ]);
    }

    /**
     * show the form for creating a new resource
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

}
