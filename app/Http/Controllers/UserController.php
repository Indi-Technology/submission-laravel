<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class UserController extends Controller
{
    public function index(Request $request){
        $categoryId = $request->input('category_id');
        $query = Article::with(['category', 'tags']);
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $articles = $query->paginate(15);
        $categories = Category::all();
        $message = $articles->isEmpty() ? 'No articles in this category.' : '';

        return view('user.blog', compact('articles', 'categories', 'message'));
    }

    public function about(){
        return view('user.about');
    }

    public function view($id) {
        $article = Article::with(['category', 'tags'])->findOrFail($id);
        $tags = $article->tags->pluck('id');
        $relatedArticles = Article::with(['category', 'tags'])
            ->whereHas('tags', function($query) use ($tags) {
                $query->whereIn('tags.id', $tags);
            })
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $previousArticle = Article::where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->first();
    
        $nextArticle = Article::where('id', '>', $id)
            ->orderBy('id')
            ->first();

        return view('user.view', compact('article', 'relatedArticles', 'previousArticle', 'nextArticle'));
    }
}
