<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index(Request $request) {
        $categoryId = $request->input('category_id');
        $searchQuery = $request->input('search');
        $query = Article::with(['category', 'tags']);
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        }

        $articles = $query->paginate(15);
        $categories = Category::all();
        $message = $articles->isEmpty() ? 'No articles in this category.' : '';

        return view('admin.articles.index', compact('articles', 'categories', 'message'));
    }

    public function dashboard() {
        $articles = Article::all();
        $categories = Category::all();
        $tag = Tag::all();

        return view('dashboard', compact('articles', 'categories', 'tag'));
    }

    public function articleView($id) {
        $article = Article::findOrFail($id);

        return view('admin.articles.view', compact('article'));
    }

    public function create() {
        $categories = Category::all();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate($this->getValidationRules());
        $articleData = $this->getArticleDataFromRequest($request);
        $article = Article::create($articleData);
        $this->syncTags($article, $request->input('tags'));

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate($this->getValidationRules());
        $article = Article::findOrFail($id);
        if ($request->hasFile('image')) {
            $this->deleteOldImage($article->image);
        }

        $article->tags()->detach();
        Tag::doesntHave('articles')->delete();
        $articleData = $this->getArticleDataFromRequest($request);
        $article->update($articleData);
        $this->syncTags($article, $request->input('tags'));

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        if ($article->image) {
            $imagePath = storage_path('app/public/images/' . $article->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $article->tags()->detach();
        Tag::doesntHave('articles')->delete();
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }

    private function getValidationRules() {
        return [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => ['nullable', 'array', 'max:2'],
        ];
    }

    private function getArticleDataFromRequest(Request $request) {
        $articleData = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $articleData['image'] = $imageName;
        }

        return $articleData;
    }

    private function syncTags(Article $article, $tags) {
        if ($tags) {
            $tagIds = collect($tags)
                ->filter()
                ->map(function ($tagName) {
                    return Tag::firstOrCreate(['name' => $tagName])->id;
                })
                ->toArray();

            if (!empty($tagIds)) {
                $article->tags()->sync($tagIds);
            }
        } else {
            $article->tags()->detach();
        }
    }

    private function deleteOldImage($imageName) {
        if ($imageName) {
            $imagePath = storage_path('app/public/images/' . $imageName);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

}
