<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function categoryWiseProduct(){
        return "category page";
    }

    public function subCategoryWiseProduct(){
        return "sub category page";
    }
}
