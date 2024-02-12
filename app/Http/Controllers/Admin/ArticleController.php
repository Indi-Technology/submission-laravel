<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::with('tags')->get();
        $query = $request->input('query');
        $articles = Article::where('title', 'like', '%' . $query . '%')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|string',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image' => $request->file('image') ? $request->file('image')->store('articles', 'public') : null,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);

        if ($request->tags) {
            $tagNames = explode(';', $request->tags);
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $tagIds[] = $tag->id;
            }
            $article->tags()->sync($tagIds);
        }

        return redirect()->route('article.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = $article->tags()->pluck('name')->implode(';');

        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'full_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|string',
        ]);

        $article->update([
            'title' => $request->title,
            'full_text' => $request->full_text,
            'image' => $request->file('image') ? $request->file('image')->store('articles', 'public') : $article->image,
            'category_id' => $request->category_id,
        ]);

        $tagNames = explode(';', $request->tags);
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $tagIds[] = $tag->id;
        }
        $article->tags()->sync($tagIds);

        return redirect()->route('article.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Article deleted successfully.');
    }
}
