<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('article.index', compact('articles'));
    }
    public function show($id)
    {
        $article = Article::with('tags', 'category', 'user')->findOrFail($id);

        return view('article.show', compact('article'));
    }
}
