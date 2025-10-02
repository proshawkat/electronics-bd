<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Customer;
use App\Models\Order;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $orders = Order::with('customer')->latest()->paginate(5);
        $totalCustomers = Customer::count();
        $totalOrders    = Order::count();
        $totalDelivered = Order::where('status', 'delivered')->count();
        $totalProducts  = Product::count();
        return view('dashboard', compact('orders','totalCustomers','totalOrders','totalDelivered','totalProducts'));
    }

    public function getNewsletter(){
        $newsletters = Newsletter::latest()->paginate(15);
        return view('backend.newsletter', compact('newsletters'));
    }

    public function getCustomer(){
        $customers = Customer::latest()->paginate(15);
        return view('backend.customer', compact('customers'));
    }

    public function getContactUs(){
        $contacts = ContactUs::latest()->paginate(15);
        return view('backend.contact', compact('contacts'));
    }

    public function getUsers(){
        $users = User::latest()->paginate(15);
        return view('backend.users', compact('users'));
    }
}
