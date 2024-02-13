<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\EditPostRequest;
use App\Http\Requests\Admin\CreatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all posts with their associated category and paginate them
        $posts = Post::with('category')->paginate(20);

        // Return the view with posts data
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retrieve all categories to populate the category select input in the create form
        $categories = Category::all();

        // Return the view for creating a new post
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \App\Http\Requests\Admin\CreatePostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        // Split the tags string into an array
        $tags = explode(',', $request->tags);

        // Process image upload if present
        if ($request->has('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }
        
        // Create a new post with validated data and associate it with the authenticated user
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'image' => $filename ?? null,
            'text' => $request->text,
            'category_id' => $request->category
        ]);

        // Attach tags to the post
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name_tag' => $tagName]);
            $post->tags()->attach($tag);
        }

        // Redirect back to the index page with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        // Retrieve all categories to populate the category select input in the edit form
        $categories = Category::all();
        
        // Retrieve tags associated with the post and format them as a comma-separated string
        $tags = $post->tags->implode('name_tag', ', ');

        // Return the view for editing the specified post
        return view('admin.posts.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \App\Http\Requests\Admin\EditPostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditPostRequest $request, Post $post)
    {
        // Split the tags string into an array
        $tags = explode(',', $request->tags);

        // Process image upload if present
        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $post->image);
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }

        // Update the post with validated data
        $post->update([
            'title' => $request->title,
            'image' => $filename ?? $post->image,
            'text' => $request->text,
            'category_id' => $request->category
        ]);

        // Sync tags for the post
        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name_tag' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);

        // Redirect back to the index page with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        // Delete the image associated with the post if it exists
        if ($post->image) {
            Storage::delete('public/uploads/' . $post->image);
        }

        // Detach all tags associated with the post
        $post->tags()->detach();

        // Delete the post
        $post->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }
}
