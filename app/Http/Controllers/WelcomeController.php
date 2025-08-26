<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index(){
        $homeProducts = Product::where('status', 1)->take(20)->get(['id', 'name', 'sale_price', 'first_image_url', 'second_image_url']);
        $featuredProducts = Product::where('is_featured', 1)->where('status', 1)->take(5)->get(['id', 'name', 'sale_price', 'first_image_url', 'second_image_url']);
        return view('welcome', compact('featuredProducts', 'homeProducts'));
    }
}
