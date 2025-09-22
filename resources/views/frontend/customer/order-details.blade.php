@extends('layouts.frontend')

@section('content') 
<div id="account-order" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left" colspan="2">Order Details</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left" style="width: 50%;">
                            <b>Order ID:</b> #{{$order->order_code}}<br />
                            <b>Date Added:</b> {{ $order->created_at->format('Y-m-d') }}
                        </td>
                        <td class="text-left" style="width: 50%;">
                            <b>Payment Method:</b> {{$order->payment_method}}<br />
                            <b>Shipping Method:</b> {{$order->shipping_method}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left" style="width: 50%; vertical-align: top;">Payment Address</td>
                        <td class="text-left" style="width: 50%; vertical-align: top;">Shipping Address</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            {{ $order->billingAddress?->first_name }} {{ $order->billingAddress?->last_name }} <br> 
                            {{ $order->billingAddress?->address_1 }}<br /> {{ $order->billingAddress?->city }}<br /> 
                            {{ $order->billingAddress?->region?->name }} <br />
                            Bangladesh
                        </td>
                        <td class="text-left">
                            @php
                                $ship = $order->shippingAddress ?? $order->billingAddress;
                            @endphp
                            {{ $ship->first_name }} {{ $ship->last_name }}<br> 
                            {{ $ship->address_1 }}<br /> {{ $ship->city }}<br /> 
                            {{ $ship->region?->name }} <br />
                            Bangladesh
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-order">
                    <thead>
                        <tr>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Model</td>
                            <td class="text-right">Quantity</td>
                            <td class="text-right">Price</td>
                            <td class="text-right">Total</td>
                            <td style="width: 20px;"></td>
                        </tr>
                    </thead>
                    @php
                        $subTotal = 0;
                    @endphp
                    <tbody>
                        @foreach($order->items as $item)
                            @php
                                $lineTotal = $item->quantity * ($item->product->sale_price ?? 0);
                                $subTotal += $lineTotal;
                            @endphp
                            <tr class="">
                                <td class="text-left">{{ $item->product->name ?? 'Deleted Product' }}</td>
                                <td class="text-left">{{ $item->product->model ?? 'Deleted Product' }}</td>
                                <td class="text-right">{{ $item->quantity }}</td>
                                <td class="text-right">{{ $item->product->sale_price }}৳</td>
                                <td class="text-right">{{ $lineTotal }}৳</td>
                            </tr>
                        @endforeach    
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Sub-Total</b></td>
                            <td class="text-right">{{ $subTotal }}৳</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Pickup From Store</b></td>
                            <td class="text-right">0৳</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><b>Total</b></td>
                            <td class="text-right">{{ $subTotal }}৳</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td class="text-left">Order Comments</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">{{$order->order_comment}}</td>
                    </tr>
                </tbody>
            </table>
            <h2 class="title">Order History</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="text-left">Date Added</td>
                            <td class="text-left">Status</td>
                            <td class="text-left">Comment</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">{{ $order->updated_at->format('Y-m-d') }}</td>
                            <td class="text-left">{{ $order->status }} </td>
                            <td class="text-left">{{ $order->owner_comment }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="buttons clearfix">
                <div class="pull-right"><a href="{{ route('customer.order_return', $order->order_code) }}" class="btn btn-primary">Return</a></div>
                <div class="pull-right"><a href="{{ route('customer.order') }}" class="btn btn-primary">Continue</a></div>
            </div>
        </div>
        
        @include('frontend.partials.account-menu')

    </div>
</div>
@endsection