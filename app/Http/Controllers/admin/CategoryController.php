<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(7);

        return view('admin.categories.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('success','Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category) : RedirectResponse
    {
        $category->update($request->all());
        return redirect()->route('admin.categories.index')
                ->withSuccess('Product is updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->posts()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, category has posts.']);
        }

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}

