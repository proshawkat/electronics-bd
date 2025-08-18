<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->latest()->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->pluck('name', 'id');
        return view('backend.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'status'     => $request->status ?? false,
            'parent_id'  => $request->parent_id,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->pluck('name', 'id');
        return view('backend.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'status'     => $request->status ?? false,
            'parent_id'  => $request->parent_id,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->back()->with('error', 'This category has products. You cannot delete it!');
        }

        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
