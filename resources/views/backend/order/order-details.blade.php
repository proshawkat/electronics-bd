
@extends('layouts.app')
@section('styles')   
    <style>
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: #FFFFFF;
            padding: 1.5rem;
            border-right: 1px solid #E6E8EB;
        }
        .main-content {
            flex-grow: 1;
            padding: 1.5rem 2rem;
            overflow-y: auto;
        }
        .custom-card {
            background-color: #FFFFFF;
            border: 1px solid #E6E8EB;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.03);
        }
        .badge-pending {
            background-color: #FEEED4;
            color: #E27F0A;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 500;
        }
        .badge-unfulfilled {
            background-color: #FEE1E1;
            color: #C11818;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 500;
        }
    </style>
@endsection
@section('content')   
<div class="app-content">
    <form action="{{ route('admin.order_update', $order->id) }}" method="post">
        @csrf
        @php
            $status = strtolower($order->status);
        @endphp
        <div class="container-fluid pt-3">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <section class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4">
                        <div class="mb-3 mb-md-0">
                            <h1 class="fs-4 fw-semibold text-gray-800">Order ID: {{ $order->order_code }}</h1>
                            <div class="d-flex align-items-center mt-1 text-sm text-gray-500">
                                <span>{{ $order->created_at->format('F j, Y \a\t g:i a') }}</span>
                                <span class="badge badge-pending ms-2">{{ ucfirst($order->status) }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary me-2">Back</a>
                            @if($status == 'pending')
                                <button type="submit" name="action" value="reject" class="btn btn-outline-danger me-2">❌ Reject Order</button>
                                <button type="submit" name="action" value="processing" class="btn btn-outline-primary me-2">✅ Mark as Processing</button>
                            @elseif($status == 'processing')
                                <button type="submit" name="action" value="shipped" class="btn btn-outline-primary me-2">🚚 Mark as Shipped</button>
                            @elseif($status == 'shipped')
                                <button type="submit" name="action" value="delivered" class="btn btn-outline-success me-2">📦 Mark as Delivered</button>
                            @endif
                        </div>
                    </section>
                </div>
                <!-- Main Content Area -->
                <div class="col-md-8">
                    <!-- Main Cards Section -->
                    <div class="flex-grow-1">
                        <!-- Order Item Card -->
                        <div class="custom-card p-4 mb-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h2 class="fs-5 fw-semibold text-gray-800">Order item</h2>
                                <i class="fa-solid fa-chevron-down text-gray-400"></i>
                            </div>
                            @foreach($order->items as $item)
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ asset('public/'.$item->product->first_image_url) }}" alt="Macbook Air" class="rounded-3 me-3" style="width: 80px; height: 80px;">
                                    <div class="flex-grow-1">
                                        <p class="fw-semibold text-gray-800 mb-0">{{ $item->product->name }}</p>
                                        <p class="text-gray-700 mb-0">{{ $item->product->brand?->name }}</p>
                                        <div class="d-flex align-items-center text-sm text-gray-500 mt-1">
                                            <span>{{ $item->product->model ?? '' }}</span>
                                            <span class="mx-1">&middot;</span>
                                            <span>{{ $item->product->product_code ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <p class="text-gray-700 mb-0">{{ $item->quantity }} x ৳{{ number_format($item->price, 2) }}</p>
                                        <p class="fw-semibold text-gray-800 mb-0">৳{{ number_format($item->quantity * $item->price, 2) }}</p>
                                    </div>
                                </div>
                            @endforeach    
                            <hr class="my-3 text-gray-200">
                            @if($status == 'pending')
                                <div class="w-100">
                                    <div class="form-group mb-2">
                                        <textarea name="owner_comments" id="" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" name="action" value="reject" class="btn btn-primary bg-purple-600 border-0">❌ Reject Order</button>
                                    <button type="submit" name="action" value="processing" class="btn btn-primary bg-purple-600 border-0">✅ Mark as Processing</button>
                                </div>
                            @endif    
                        </div>

                        <!-- Order Summary Card -->
                        <div class="custom-card p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h2 class="fs-5 fw-semibold text-gray-800">Order Summary</h2>
                                <i class="fa-solid fa-chevron-down text-gray-400"></i>
                            </div>
                            <span class="badge badge-pending mb-3 d-inline-block">Payment {{ $order->payment_status }}</span>
                            
                            <div class="row g-2">
                                <div class="d-flex justify-content-between">
                                    <span class="text-sm text-gray-700">Subtotal</span>
                                    <span class="text-sm text-gray-700">৳{{ number_format($order->items->sum(fn($i) => $i->price * $i->quantity), 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-sm text-gray-700">Discount</span>
                                    <span class="text-sm text-red-500">- ৳0.00</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-sm text-gray-700">Shipping</span>
                                    <span class="text-sm text-gray-700">৳{{ number_format($order->shipping_cost ?? 0, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between pt-2 border-top border-gray-200 mt-2">
                                    <span class="text-sm fw-semibold text-gray-800">Total</span>
                                    <span class="text-sm fw-semibold text-gray-800">৳{{ number_format($order->total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Panel -->
                <div class="col-md-4">
                    <!-- Notes Card -->
                    <div class="custom-card p-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h3 class="fs-6 fw-semibold text-gray-800 mb-0">Customer Comment</h3>
                            <i class="fa-regular fa-pen-to-square text-gray-400"></i>
                        </div>
                        <p class="text-sm text-gray-500 mb-0">{{ $order->order_comment }}</p>
                    </div>

                    <!-- Notes Card -->
                    <div class="custom-card p-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h3 class="fs-6 fw-semibold text-gray-800 mb-0">Owner Comment</h3>
                            <i class="fa-regular fa-pen-to-square text-gray-400"></i>
                        </div>
                        <p class="text-sm text-gray-500 mb-0">{{ $order->owner_comment }}</p>
                    </div>

                    <!-- Customers Card -->
                    <div class="custom-card p-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h3 class="fs-6 fw-semibold text-gray-800 mb-0">Customers</h3>
                            <i class="fa-regular fa-pen-to-square text-gray-400"></i>
                        </div>
                        @if($order->customer)
                            <p class="mb-0">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $order->customer->email }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $order->customer->phone }}</p>
                        @else
                            <p class="text-sm text-gray-500 mb-0">Guest</p>
                        @endif
                    </div>

                    <!-- Contact Information Card -->
                    <div class="custom-card p-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h3 class="fs-6 fw-semibold text-gray-800 mb-0">Contact information</h3>
                            <i class="fa-regular fa-pen-to-square text-gray-400"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <p class="text-sm text-gray-500 mb-0">{{ $order->billingAddress->first_name ?? $order->shippingAddress->first_name ?? '-' }} {{ $order->billingAddress->last_name ?? $order->shippingAddress->last_name ?? '-' }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $order->billingAddress->email ?? $order->shippingAddress->email ?? '-' }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $order->billingAddress?->telephone }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $order->billingAddress?->address_1 }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $order->billingAddress?->city }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $order->billingAddress?->region?->name }}</p>
                        </div>
                    </div>

                    <!-- Shipping Address Card -->
                    <div class="custom-card p-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h3 class="fs-6 fw-semibold text-gray-800 mb-0">Shipping address</h3>
                            <i class="fa-regular fa-pen-to-square text-gray-400"></i>
                        </div>
                        <div class="d-flex flex-column">
                        @php
                            $address = $order->shippingAddress ?? $order->billingAddress;
                        @endphp
                        @if($address)
                            <p class="mb-0">{{ $address->first_name }} {{ $address->last_name }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $address->email }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $address->telephone }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $address->address_1 }}</p>
                            <p class="text-sm text-gray-500 mb-0">{{ $address->city }} {{ $address->region?->name }}</p>
                        @else
                            <p class="text-sm text-gray-500 mb-0">No address provided</p>
                        @endif
                        </div>
                    </div>
                    
                </div>
            </div>    
        </div>
    </form>       
</div>    
@endsection