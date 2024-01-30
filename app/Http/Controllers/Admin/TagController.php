<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTagRequest;
use App\Http\Requests\Admin\EditTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tags = Tag::paginate(20);
        return view('admin.tag.index', compact('Tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return('admin.tags.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {
        //
        $tag = Tag::create($request->validated());

        if ($tag){
            return redirect()->route('admin.tags.index')->with('success', 'Tag created successfully');
        }
        return back()->with('error', 'Tag creation failed');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
        return view('admin.tags.edit', compact('tag'));



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditTagRequest $request, Tag $tag)
    {
        //
        $tag->update($request->validated());
        return redirect()->route('admin.tags.index')->with('success', 'Tag updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
        foreach($tag->posts as $post){
            $post->tags()->detach();
        }
        if (!$tag->posts()->count()){
            $tag->delete();
        }
        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted successfully');
    }
}
