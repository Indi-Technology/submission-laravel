<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(4);
        
        return view('categories.category', compact('category'));
    }

    public function create()
    {
        return view('categories.create-category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        Category::create([
            'name' => $request->name,
        ]);

    return redirect()->route('categories')->with('success');
    }

    
    public function edit($id)
    {
        $category = Category::find($id);
        
        return view ('categories.edit-category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if($request->has('name') && !is_null($request->name)) {
            $category->name = $request->name;
        }

        $category->save();
        
        return redirect()->route('categories')->with('success');
    }

    public function destroy($id)
    {
        Category::where('id', '=', $id)->delete();
        
        return redirect()->route('categories')->with('success');
    }
}
