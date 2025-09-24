<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function all()
    {
        $orders = Order::with('customer', 'shippingAddress', 'billingAddress')->latest()->paginate(20);
        return view('backend.order.index', compact('orders'));
    }

    public function orderDetails($code){
        $order = Order::with('items', 'billingAddress', 'shippingAddress')->where('order_code', $code)->first();
        return view('backend.order.order-details', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $action = $request->input('action');
        $comment = $request->input('owner_comments') ?? null;

        if ($action === 'processing') {
            $order->status = 'processing';
            $order->shipping_status = 'pending';
        } elseif ($action === 'shipped') {
            $order->status = 'shipped';
            $order->shipping_status = 'shipped';
        } elseif ($action === 'delivered') {
            $order->status = 'delivered';
            $order->shipping_status = 'delivered';
            $order->payment_status = 'paid';
        } elseif ($action === 'reject') {
            $order->status = 'rejected';
            $order->shipping_status = 'canceled';
        }

        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    public function allPending()
    {
        $orders = Order::with('customer', 'shippingAddress', 'billingAddress')->whereRaw('LOWER(status) = ?', ['pending'])->latest()->paginate(20);
        return view('backend.order.index', compact('orders'));
    }

    public function allDelivered()
    {
        $orders = Order::with('customer', 'shippingAddress', 'billingAddress')->whereRaw('LOWER(status) = ?', ['delivered'])->latest()->paginate(20);
        return view('backend.order.index', compact('orders'));
    }
}
