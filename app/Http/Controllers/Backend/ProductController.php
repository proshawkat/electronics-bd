<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filter == 'no_sale_price') {
            $query->where('no_sale_price', 1);
        }

        if ($request->filter == 'out_of_stock') {
            $query->where('stock_status', 0);
        }

        if ($request->filter == 'in_stock') {
            $query->where('stock_status', 1);
        }

        $products = $query->latest()->paginate(10);

        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->pluck('name', 'id');
        $brands = Brand::where('status', 1)->get();
        return view('backend.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products,slug',
            'product_code' => 'required|unique:products,product_code',
            'description' => 'required',
            'first_image_url' => 'required|image|max:2048',
            'second_image_url' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
        ]);

        $slug = $request->slug ?? Str::slug($request->name);

        $firstImageUrl = $this->uploadImage($request->file('first_image_url'));
        $secondImageUrl = $request->hasFile('second_image_url') ? $this->uploadImage($request->file('second_image_url')) : null;

        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'product_code' => $request->product_code,
            'model' => $request->model,
            'description' => $request->description,
            'stock_status' => $request->has('stock_status') ? 1 : 0,
            'quantity' => $request->quantity,
            'discount_percent' => $request->discount_percent,
            'sale_price' => $request->sale_price,
            'original_price' => $request->original_price,
            'first_image_url' => $firstImageUrl,
            'second_image_url' => $secondImageUrl,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'status' => $request->has('status') ? 1 : 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'is_clearance_outlet' => $request->has('is_clearance_outlet') ? 1 : 0,
            'no_sale_price' => $request->has('no_sale_price') ? 1 : 0,
        ]);

        // Gallery Images
        if($request->hasFile('gallery_images')){
            foreach($request->file('gallery_images') as $image){
                ProductGallery::create([
                    'product_id' => $product->id,
                    'original_url' => $this->uploadImage($image),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::with('galleries')->findOrFail($id);
        $categories = Category::whereNull('parent_id')->pluck('name', 'id');
        $subCategories = Category::where('parent_id', $product->category_id)->get();
        $brands = Brand::where('status', 1)->get();
        return view('backend.products.edit', compact('product', 'categories', 'brands', 'subCategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products,slug,' . $product->id,
            'product_code' => 'required|unique:products,product_code,' . $product->id,
            'description' => 'required',
            'first_image_url' => 'nullable|image|max:2048',
            'second_image_url' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
        ]);

        $slug = $request->slug ?? Str::slug($request->name);

        $firstImageUrl = $product->first_image_url;
        if ($request->hasFile('first_image_url')) {
            if (file_exists(public_path($product->first_image_url))) {
                unlink(public_path($product->first_image_url));
            }
            $firstImageUrl = $this->uploadImage($request->file('first_image_url'));
        }

        $secondImageUrl = $product->second_image_url;
        if ($request->hasFile('second_image_url')) {
            if ($secondImageUrl && file_exists(public_path($secondImageUrl))) {
                unlink(public_path($secondImageUrl));
            }
            $secondImageUrl = $this->uploadImage($request->file('second_image_url'));
        }

        $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'product_code' => $request->product_code,
            'model' => $request->model,
            'description' => $request->description,
            'stock_status' => $request->has('stock_status') ? 1 : 0,
            'quantity' => $request->quantity,
            'sale_price' => $request->sale_price,
            'discount_percent' => $request->discount_percent,
            'original_price' => $request->original_price,
            'first_image_url' => $firstImageUrl,
            'second_image_url' => $secondImageUrl,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'status' => $request->has('status') ? 1 : 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'is_clearance_outlet' => $request->has('is_clearance_outlet') ? 1 : 0,
            'no_sale_price' => $request->has('no_sale_price') ? 1 : 0,
        ]);

        // Gallery Images Add
        if ($request->hasFile('gallery_images')) {
            $oldImages = ProductGallery::where('product_id', $product->id)->get();
            foreach ($oldImages as $oldImage) {
                if (file_exists(public_path($oldImage->original_url))) {
                    unlink(public_path($oldImage->original_url));
                }
                $oldImage->delete();
            }

            foreach ($request->file('gallery_images') as $image) {
                ProductGallery::create([
                    'product_id' => $product->id,
                    'original_url' => $this->uploadImage($image),
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    private function uploadImage($file, $folder = 'products')
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/' . $folder), $filename);

        return 'uploads/' . $folder . '/' . $filename;
    }


}
