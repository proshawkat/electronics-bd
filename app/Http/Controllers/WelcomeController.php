<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index(){
        $homeProducts = Product::where('status', 1)->take(20)->get(['id', 'name', 'slug', 'sale_price', 'first_image_url', 'second_image_url']);
        $featuredProducts = Product::where('is_featured', 1)->where('status', 1)->take(5)->get(['id', 'name', 'sale_price', 'first_image_url', 'second_image_url']);
        return view('welcome', compact('featuredProducts', 'homeProducts'));
    }

    public function singleProduct($id){
        $product = Product::select('id', 'name', 'sale_price', 'stock_status', 'product_code', 'model', 'first_image_url', 'second_image_url')
                    ->where('id', $id)
                    ->where('status', 1)
                    ->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    public function slugWiseroduct($slug){
        $breadcrumbs = [
            ['title' => ucfirst(str_replace('-', ' ', $slug)), 'url' => $slug]
        ];
        $product = Product::with('galleries')->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)->get(['id', 'name', 'slug', 'sale_price', 'first_image_url', 'second_image_url']);

        $galleryJson = $product->galleries->map(function($gallery) use ($product) {
            return [
                'src' => asset('public/'.$gallery->original_url), 
                'thumb' => asset('public/'.$gallery->original_url),
                'subHtml' => $product->name                         
            ];
        });
        $galleryJsonString = $galleryJson->toJson();

        return view('frontend.single_product', compact('breadcrumbs', 'product', 'relatedProducts', 'galleryJsonString'));
    }
}
