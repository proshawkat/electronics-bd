<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $breadcrumbs = [
            ['title' => 'Contact Us', 'url' => '#']
        ];
        return view('frontend.contact', compact('breadcrumbs'));
    }

    public function store(){
        return 'hello';
    }
}
