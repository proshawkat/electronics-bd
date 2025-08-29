<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Tag;

class HomeController extends Controller
{
    public function categoryWiseProduct(Request $request, $slug){
        $breadcrumbs = [
            ['title' => ucfirst(str_replace('-', ' ', $slug)), 'url' => '#']
        ];
        $category = Category::where('slug', $slug)->whereNull('parent_id')->firstOrFail();
        $subcategories = Category::where('parent_id', $category->id)->where('status', 1)->get();
        $brands = Brand::where('status', 1)->get(['id', 'name', 'slug']);
        $tags = Tag::get(['id', 'name']);

        $sort = $request->get('sort', 'p.sort_order');
        $order = $request->get('order', 'ASC');
        $limit = $request->get('limit', 20);

        $products = Product::where('category_id', $category->id)->where('status', 1)->select('id', 'name', 'slug', 'sale_price', 'stock_status', 'product_code', 'model', 'first_image_url');

        if ($sort == 'pd.name') {
            $products = $products->orderBy('name', $order);
        } elseif ($sort == 'p.price') {
            $products = $products->orderBy('sale_price', $order);
        } elseif ($sort == 'p.model') {
            $products = $products->orderBy('model', $order);
        } elseif ($sort == 'rating') {
            $products = $products->orderBy('rating', $order);
        } else {
            $products = $products->orderBy('id', $order);
        }

        if ($request->has('c')) {
            $products->whereIn('sub_category_id', explode(',', $request->c));
        }

        if ($request->has('m')) {
            $products->whereIn('brand_id', explode(',', $request->m));
        }

        if ($request->has('tags')) {
            $tagIds = explode(',', $request->tags);

            $products->where(function ($q) use ($tagIds) {
                foreach ($tagIds as $tagId) {
                    $q->orWhereJsonContains('tag_id', (int) $tagId);
                }
            });
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $products->whereBetween('sale_price', [$request->min_price, $request->max_price]);
        }

        $products = $products->paginate($limit);

        return view('frontend.category', compact('breadcrumbs', 'slug', 'subcategories', 'products', 'brands', 'tags'));
    }

    public function subCategoryWiseProduct(Request $request, $slug, $s_slug){
        $breadcrumbs = [
            ['title' => ucfirst(str_replace('-', ' ', $slug)), 'url' => $slug],
            ['title' => ucfirst(str_replace('-', ' ', $s_slug)), 'url' => $s_slug]
        ];
        $category = Category::where('slug', $slug)->whereNull('parent_id')->firstOrFail();
        $subcategory = Category::where('slug', $s_slug)->where('status', 1)->firstOrFail();
        $brands = Brand::where('status', 1)->get(['id', 'name', 'slug']);
        $tags = Tag::get(['id', 'name']);

        $sort = $request->get('sort', 'p.sort_order');
        $order = $request->get('order', 'ASC');
        $limit = $request->get('limit', 20);

        $products = Product::where('category_id', $category->id)->where('sub_category_id', $subcategory->id)->where('status', 1)->select('id', 'name', 'slug', 'sale_price', 'stock_status', 'product_code', 'model', 'first_image_url');

        if ($sort == 'pd.name') {
            $products = $products->orderBy('name', $order);
        } elseif ($sort == 'p.price') {
            $products = $products->orderBy('sale_price', $order);
        } elseif ($sort == 'p.model') {
            $products = $products->orderBy('model', $order);
        } elseif ($sort == 'rating') {
            $products = $products->orderBy('rating', $order);
        } else {
            $products = $products->orderBy('id', $order);
        }

        if ($request->has('m')) {
            $products->whereIn('brand_id', explode(',', $request->m));
        }

        if ($request->has('tags')) {
            $tagIds = explode(',', $request->tags);

            $products->where(function ($q) use ($tagIds) {
                foreach ($tagIds as $tagId) {
                    $q->orWhereJsonContains('tag_id', (int) $tagId);
                }
            });
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $products->whereBetween('sale_price', [$request->min_price, $request->max_price]);
        }

        $products = $products->paginate($limit);

        return view('frontend.sub_category', compact('breadcrumbs', 'products', 'brands', 'tags'));
    }
}
