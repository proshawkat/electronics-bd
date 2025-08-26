<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index(){
        $featuredProducts = Product::where('is_featured', 1)->take(8)->get();
        return view('welcome', compact('featuredProducts'));
    }
}
