@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'All Order'])
    
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">All Orders</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Code</th>
                                    <th>Customer</th>
                                    <th>Shipping</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as  $order)
                                        @php
                                            $address = $order->shippingAddress ?? $order->billingAddress;
                                        @endphp
                                        <tr class="align-middle">
                                            <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}</td>
                                            <td>{{ $order->order_code }}</td>
                                            <td>
                                                @if($order->customer_id)
                                                    {{ $order->customer->first_name ?? '' }} {{ $order->customer->last_name ?? '' }}
                                                @else
                                                    Guest
                                                @endif
                                            </td>
                                            <td>{{ $address?->first_name }} {{ $address?->last_name }} <br>
                                                {{ $address?->region?->name }}
                                                <br>
                                                {{ $address?->address_1 }}
                                            </td>
                                            <td>{{ $order->items->sum('quantity') }}</td>
                                            <td>{{ $order->total }} ৳</td>
                                            <td>
                                                @if(strtolower($order->status) === 'pending')
                                                    <span class="badge text-bg-primary">{{ ucfirst($order->status) }}</span>
                                                @elseif(strtolower($order->status) === 'processing')
                                                    <span class="badge text-bg-warning">{{ ucfirst($order->status) }}</span>
                                                @elseif(strtolower($order->status) === 'rejected')
                                                    <span class="badge text-bg-danger">{{ ucfirst($order->status) }}</span>
                                                @elseif(strtolower($order->status) === 'delivered')
                                                    <span class="badge text-bg-success">{{ ucfirst($order->status) }}</span>
                                                @else
                                                    <span class="badge text-bg-secondary">{{ ucfirst($order->status) }}</span>
                                                @endif
                                            </td>
                                            <td style="max-width:50px;" class="text-center">
                                                <a href="{{ route('admin.order_details', $order->order_code) }}" class="btn btn-sm btn-outline-info me-1"><i class="bi bi-eye"></i></a>
                                                @if(strtolower($order->status) == 'pending')
                                                    <form action="{{ route('admin.order_update', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to mark this order as Processing?');">
                                                        @csrf
                                                        <button type="submit" name="action" value="processing" class="btn btn-sm btn-warning me-1">
                                                            <i class="bi bi-truck"></i> 
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.order_update', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to Reject this order?');">
                                                        @csrf
                                                        <button type="submit" name="action" value="rejected" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-x-circle"></i>
                                                        </button>
                                                    </form>

                                                @elseif(strtolower($order->status) == 'processing')
                                                    <form action="{{ route('admin.order_update', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to mark this order as Shipped?');">
                                                        @csrf
                                                        <button type="submit" name="action" value="shipped" class="btn btn-sm btn-primary">
                                                            <i class="bi bi-box-seam"></i>
                                                        </button>
                                                    </form>

                                                @elseif(strtolower($order->status) == 'shipped')
                                                    <form action="{{ route('admin.order_update', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to mark this order as Delivered?');">
                                                        @csrf
                                                        <button type="submit" name="action" value="delivered" class="btn btn-sm btn-success">
                                                            <i class="bi bi-check-circle"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr> 
                                    @endforeach                               
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $orders->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection