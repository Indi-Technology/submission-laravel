<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::with('category', 'articleTag.tag')->paginate(3);

        $tag = ArticleTag::with('tag')->get();

        return view('articles.article', compact('article', 'tag'));
    }

    public function homepage()
    {
        $article = Article::with('category')->paginate(4);

        $tag = ArticleTag::with('tag')->get();

        return view('homepage', compact('article', 'tag'));
    }

    public function details($id)
    {
        $article = Article::with('category')->find($id);

        $tag = ArticleTag::with('tag')->get();

        return view('detail', compact('article', 'tag'));
    }

    public function create()
    {
        $tag = Tag::all();

        $category = Category::all();

        return view('articles.create-article', ['tag' => $tag], compact('category', 'tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required', 'image'],
            'id_category' => ['required'],
            'tag' => ['required', 'array']
        ]);

        $path = $request->file('image')->store('images', 'public');

        $path = str_replace('public/', '', $path);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
            'id_categories' => $request->id_category,
        ]);

        foreach ($request->tag as $tagId) {
            ArticleTag::create([
                'id_articles' => $article->id,
                'id_tags' => $tagId,
            ]);
        }

        return redirect()->route('articles')->with('success');
    }

    public function edit($id)
    {
        $article = Article::find($id);

        $category = Category::all();

        $tag = Tag::all();

        $articleTag = ArticleTag::where('id_articles', $id)->pluck('id_tags')->toArray();

        return view('articles.edit-article', compact('article', 'category', 'tag', 'articleTag'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $tag = ArticleTag::with('tag')->where('id_articles', $article->id)->get();
        // dd($request);
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required', 'image'],
            'id_categories' => ['required'],
            'tag' => ['required', 'array']
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($article->image);

            $image = $request->file('image');

            $path = $image->store('public/images');

            $article->image = str_replace('public/', '', $path);
        }

        $currentTag = [];

        if ($tag) {
            foreach ($tag as $tag) {
                if ($tag->tag) {
                    $currentTag[] = $tag->tag->id;
                }
            }
        }

        $requestedTag = $request->tag;

        $tagToAdd = array_diff($requestedTag, $currentTag);

        $tagToRemove = array_diff($currentTag, $requestedTag);

        foreach ($tagToAdd as $tagId) {
            ArticleTag::create([
                'id_articles' => $article->id,
                'id_tags' => $tagId,
            ]);
        }

        foreach ($tagToRemove as $tagId) {
            ArticleTag::where([
                ['id_articles', '=', $article->id],
                ['id_tags', '=', $tagId]
            ])->delete();
        }

        Article::where('id', '=', $id)->update($request->except(['_token', '_method', 'tag']));

        $article->save();

        return redirect()->route('articles')->with('success');
    }

    public function destroy($id)
    {
        Article::where('id', '=', $id)->delete();

        return redirect()->route('articles')->with('success');
    }
}
