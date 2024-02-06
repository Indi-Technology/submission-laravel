<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with('articles')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category){
        $category = Category::findOrFail($category->id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'name' => 'required|unique:categories|max:255' . $category->id,
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category){
        try {
            $articleCount = $category->articles()->count();
            if ($articleCount > 0) {
                return redirect()->route('categories.index')->with('error', 'Cannot delete category. It has associated articles.');
            }

            $category->delete();
            
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        } catch (QueryException $e) {
            return redirect()->route('categories.index')->with('error', 'An error occurred while deleting the category.');
        }
    }
}
