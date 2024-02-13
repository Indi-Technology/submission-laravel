<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditCategoryRequest;
use App\Http\Requests\Admin\CreateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all categories with pagination
        $categories = Category::paginate(10);

        // Return the view with categories data
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a new category
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \App\Http\Requests\Admin\CreateCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        // Create a new category with validated data
        Category::create($request->validated());

        // Redirect back to the index page with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        // Return the view for editing the specified category
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \App\Http\Requests\Admin\EditCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        // Update the category with validated data
        $category->update($request->validated());

        // Redirect back to the index page with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // Check if the category has any associated posts
        if ($category->posts()->exists()) {
            // If category has posts, return back with an error message
            return back()->withErrors(['error' => 'Cannot delete, category has posts.']);
        }

        // Delete the category
        $category->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
