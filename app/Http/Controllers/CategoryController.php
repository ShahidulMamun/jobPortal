<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // Show form to create new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store new category
    public function store(Request $request)
    {
        // return $request->all();
      
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
             'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.categories.list')->with('success', 'Category created successfully.');
    }

    // Show form to edit category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id.'|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' =>Str::slug($request->name),
        ]);

        return redirect()->route('admin.categories.list')->with('success', 'Category updated successfully.');
    }

    // Delete category
    public function destroy(Category $category)
    {
        
        if ($job->employer_id !== auth('employer')->id()) {
            abort(403);
        }
        
        $category->delete();

        return redirect()->route('admin.categories.list')->with('success', 'Category deleted successfully.');
    }
}
