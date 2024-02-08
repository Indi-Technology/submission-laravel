<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }
    public function store(StoreArticleRequest $request)
    {
        $tags = explode(',', $request->tags);
        $filename = null;
        if ($request->hasFile('image_path')) {
            $filename = time() . '_' . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->storeAs('uploads', $filename, 'public');
        }
        $article = Article::create([
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'image_path' => $filename,
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category'),
        ]);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        }
        return redirect()->route('articles.index');
    }
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = $article->tags->implode('name', ', ');
        return view('admin.articles.edit', compact('article', 'tags', 'categories'));
    }
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $tags = preg_split('/\s*,\s*/', $request->tags, -1, PREG_SPLIT_NO_EMPTY);
        $filename = null;
        if ($request->hasFile('image_path')) {
            $filename = time() . '_' . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->storeAs('uploads', $filename, 'public');
        }
        $article->update([
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category'),
        ]);
        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $article->tags()->sync($newTags);
        return redirect()->route('articles.index');
    }
    public function destroy(Article $article)
    {
        if ($article->image_path) {
            Storage::delete('public/uploads/' . $article->image_path);
        }
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('articles.index');
    }
}
