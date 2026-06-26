<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
            'image' => 'nullable|image|max:2048',
        ]);

        try {
            $imageUrl = null;
            if ($request->hasFile('image')) {
                $imageUrl = $this->uploadImage($request->file('image'));
            }

            Category::create([
                'name'       => $request->name,
                'slug'       => Str::slug($request->name),
                'image'      => $imageUrl,
                'status'     => $request->status ?? false,
                'parent_id'  => $request->parent_id,
                'created_by' => Auth::id(),
            ]);
            Cache::forget('menu_categories');

            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1] ?? null;
            if($errorCode == 1062){
                return redirect()->back()->withInput()->with('error', 'Category with this name already exists.');
            }
            return redirect()->back()->withInput()->with('error', 'Database Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
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
            'image' => 'nullable|image|max:2048',
        ]);

        try {
            $imageUrl = $category->image;
            if ($request->hasFile('image')) {
                $imageUrl = $this->uploadImage($request->file('image'));
            }

            $category->update([
                'name'       => $request->name,
                'slug'       => Str::slug($request->name),
                'image'      => $imageUrl,
                'status'     => $request->status ?? false,
                'parent_id'  => $request->parent_id,
            ]);
            Cache::forget('menu_categories');

            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1] ?? null;
            if($errorCode == 1062){
                return redirect()->back()->withInput()->with('error', 'Category with this name already exists.');
            }
            return redirect()->back()->withInput()->with('error', 'Database Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->back()->with('error', 'This category has products. You cannot delete it!');
        }

        $category->delete();
        Cache::forget('menu_categories');

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

    public function getSubcategories($category_id)
    {
        $subcategories = Category::where('parent_id', $category_id)->pluck('name', 'id');

        return response()->json($subcategories);
    }

    private function uploadImage($file, $folder = 'categories')
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/' . $folder), $filename);

        return 'uploads/' . $folder . '/' . $filename;
    }
}
