<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::paginate(4);

        return view('tags.tag', compact('tag'));
    }

    public function create()
    {
        return view('tags.create-tag');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags')->with('success');
    }


    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.edit-tag', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        if ($request->has('name') && !is_null($request->name)) {
            $tag->name = $request->name;
        }

        $tag->save();

        return redirect()->route('tags')->with('success');
    }

    public function destroy($id)
    {
        Tag::where('id', '=', $id)->delete();

        return redirect()->route('tags')->with('success');
    }
}
