<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ReturnRequests;

class ReturnController extends Controller
{
    public function create($orderId)
    {
        $order = Order::where('order_code', $orderId)
            ->where('customer_id', auth('customer')->id())
            ->firstOrFail();

        if (!in_array($order->status, ['pending', 'delivered'])) {
            return redirect()->back()->with('error', 'You cannot request a return for this order. You can only request a return if the order status is Pending or Delivered.');
        }

        $alreadyRequested = ReturnRequests::where('order_code', $order->order_code)
        ->where('customer_id', auth('customer')->id())
        ->exists();

        if ($alreadyRequested) {
            return redirect()->route('customer.order')
                ->with('error', 'You have already submitted a return request for this order.');
        }

        return view('frontend.customer.return', compact('order'));
    }

    public function store(Request $request, $orderId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $order = Order::where('id', $orderId)
            ->where('customer_id', auth('customer')->id())
            ->firstOrFail();

        if (!in_array($order->status, ['pending', 'delivered'])) {
            return redirect()->back()->with('error', 'You cannot request a return for this order. You can only request a return if the order status is Pending or Delivered.');
        }
        
        ReturnRequests::updateOrCreate(
            [
                'order_code' => $order->order_code,
            ],
            [
                'customer_id' => auth('customer')->id(),
                'comment' => $request->comment,
                'status' => 'pending',
            ]
        );

        $order->update([
            'return_status' => 'requested',
        ]);

        return redirect()->route('customer.order')->with('success', 'Your return request has been submitted successfully.');
    }

    public function return(){
        $breadcrumbs = [
            ['title' => 'Account', 'url' => url('customer/dashboard')],
            ['title' => 'Order Return', 'url' => '#']
        ];
        $orders = ReturnRequests::where('customer_id', auth('customer')->id())->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.customer.return_history', compact('breadcrumbs', 'orders'));
    }
}
