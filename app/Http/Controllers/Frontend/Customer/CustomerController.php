<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function dashboard(){
        $breadcrumbs = [
            ['title' => 'Account', 'url' => '#']
        ];
        return view('frontend.customer.dashboard', compact('breadcrumbs'));
    }

}
