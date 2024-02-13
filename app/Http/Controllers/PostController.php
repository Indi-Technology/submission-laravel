<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all posts with their associated tags and category, ordered by latest, paginated
        $posts = Post::with('tags', 'category')->latest()->paginate(10);

        // Return the view with posts data
        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Retrieve the post with the specified ID and its associated tags
        $post = Post::with('tags')->findOrFail($id);
        
        // Return the view with post data
        return view('posts.show', compact('post'));
    }
}
