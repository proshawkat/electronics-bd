<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CustomerOrderController extends Controller
{
    public function orderHistory(){
        $breadcrumbs = [
            ['title' => 'Account', 'url' => url('customer/dashboard')],
            ['title' => 'Order History', 'url' => '#']
        ];
        $orders = Order::with('items')->where('customer_id', auth('customer')->id())->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.customer.order', compact('breadcrumbs', 'orders'));
    }

    public function orderDetails($code){
        $breadcrumbs = [
            ['title' => 'Account', 'url' => url('customer/dashboard')],
            ['title' => 'Order', 'url' => url('customer/order')],
            ['title' => 'Order Details', 'url' => '#']
        ];
        $order = Order::with('items', 'billingAddress', 'shippingAddress')->where('customer_id', auth('customer')->id())->where('order_code', $code)->first();
        return view('frontend.customer.order-details', compact('breadcrumbs', 'order'));
    }
    
}
