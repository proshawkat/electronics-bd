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
use DB;

class DashboardController extends Controller
{
    public function index(){
        $orders = Order::with('customer')->latest()->paginate(5);

        $totalCustomers = Customer::count();
        $totalOrders    = Order::count();
        $totalDelivered = Order::where('shipping_status', 'delivered')->count();
        $totalProducts  = Product::count();

        $orderStats = Order::select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m-01') as month"),
                DB::raw("SUM(CASE WHEN shipping_status = 'delivered' THEN 1 ELSE 0 END) as delivered"),
                DB::raw("SUM(CASE WHEN shipping_status = 'pending' THEN 1 ELSE 0 END) as pending")
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard', compact(
            'orders',
            'totalCustomers',
            'totalOrders',
            'totalDelivered',
            'totalProducts',
            'orderStats'
        ));
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
