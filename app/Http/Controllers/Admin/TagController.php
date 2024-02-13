<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditTagRequest;
use App\Http\Requests\Admin\CreateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all tags with pagination
        $tags = Tag::paginate(10);

        // Return the view with tags data
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new tag.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a new tag
        return view('admin.tags.create');
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  \App\Http\Requests\Admin\CreateTagRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateTagRequest $request)
    {
        // Create a new tag with validated data
        Tag::create($request->validated());

        // Redirect back to the index page with a success message
        return redirect()->route('admin.tags.index')->with('success', 'Tag created successfully');
    }

    /**
     * Show the form for editing the specified tag.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        // Return the view for editing the specified tag
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified tag in storage.
     *
     * @param  \App\Http\Requests\Admin\EditTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditTagRequest $request, Tag $tag)
    {
        // Update the tag with validated data
        $tag->update($request->validated());

        // Redirect back to the index page with a success message
        return redirect()->route('admin.tags.index')->with('success', 'Tag updated successfully');
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tag $tag)
    {
        // Detach the tag from all associated posts
        foreach ($tag->posts as $post) {
            $post->tags()->detach();
        }

        // Check if the tag has any associated posts, if not, delete the tag
        if (!$tag->posts()->count()) {
            $tag->delete();
        }

        // Redirect back to the index page with a success message
        return redirect()->route('admin.tags.index')->with('success', 'Tag deleted successfully');
    }
}
