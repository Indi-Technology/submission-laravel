<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }
    public function create()
    {
        return view('admin.tags.create');
    }
    public function store(StoreTagRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('tags.index');
    }
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index');
    }
    public function destroy(Tag $tag)
    {
        foreach ($tag->articles as $article) {
            $article->tags()->detach();
        }
        if (!$tag->articles()->count()) {
            $tag->delete();
        }
        return redirect()->route('tags.index');
    }
}
