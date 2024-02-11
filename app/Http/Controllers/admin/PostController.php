<?php

namespace App\Http\Controllers\Admin;

/* use App\Http\Requests\Admin\AddPostReq; */
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function dashboard()
    {
        $posts = Post::with('category')->paginate(20);
        return view('dashboard', compact('posts'));
    }

    public function detail($id)
    {
        $post = Post::with('tags')->findOrFail($id);
        return view('pages.detail', compact('post'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.posts.add', compact('categories'));
    }


    public function store(Request $request)
    {
        $tags = explode(',', $request->tags);

        $post = auth()->user()->posts()->create([
        'title' => $request->title,
        'post' => $request->post,
        'category_id' => $request->category
        ]);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        }

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = $post->tags->implode('name', ', ');

        return view('admin.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $tags = explode(',', $request->tags);

        $post->update([
            'title' => $request->title,
            'post' => $request->post,
            'category_id' => $request->category
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success','Product deleted successfully');
    }
}
