<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }
    public function add()
    {
        return view('admin.tags.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('success','Tag created successfully.');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }
    public function update(Request $request, Tag $tag) : RedirectResponse
    {
        $tag->update($request->all());
        return redirect()->route('admin.tags.index')
                ->withSuccess('tag is updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        if ($tag->posts()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, tags has posts.']);
        }

        $tag->delete();

        return redirect()->route('admin.tags.index');
    }
}
