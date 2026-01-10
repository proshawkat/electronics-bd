@extends('layouts.frontend')

                                @php
                                    use Illuminate\Support\Str;
                                @endphp
@section('content')
<div id="checkout-cart" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="cart-page">
                <form action="{{ route('cart.edit') }}" method="post" class="cart-table">
                    @csrf
                    <div class="table-responsive mobile-view-cart-product">
                        @if(count($cartItems) > 0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center td-image">Image</td>
                                        <td class="text-left td-name">Product Name</td>
                                        <td class="text-center td-qty">Quantity</td>
                                        <td class="text-center td-price">Unit Price</td>
                                        <td class="text-center td-total">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td class="text-center td-image td_center">
                                                <a href="{ $item['url'] }}">
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" title="{{ $item['name'] }}" width="60" />
                                                </a>
                                            </td>
                                            <td class="text-left td-name td_center">
                                                <a href="{{ $item['url'] }}">
                                                    @php
                                                        $text = $item['name'];
                                                        if(strlen($text) > 15){
                                                            echo substr($text, 0, 15) . '...';
                                                        } else {
                                                            echo $text;
                                                        }
                                                    @endphp
                                                </a>
                                            </td>
                                            <td class="text-center td-qty">
                                                <div class="input-group btn-block">
                                                    <div class="stepper">
                                                        <input type="text" name="quantity[{{ $item['id'] }}]" value="{{ $item['qty'] }}" size="1" class="form-control" />
                                                        <span>
                                                            <i class="fa fa-angle-up"></i>
                                                            <i class="fa fa-angle-down"></i>
                                                        </span>
                                                    </div>
                                                    <span class="input-group-btn">
                                                        <button type="submit" data-toggle="tooltip" class="btn btn-update" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                                        <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-remove" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-center td-price" data-title="Unit Price">
                                                @php
                                                    $discountAmount = $item['price'] - $item['discount_price'];
                                                @endphp

                                                @if($item['discount_percent'] > 0 || !empty($item['offer_applied']))
                                                    <span class="text-decoration-line-through text-danger">
                                                        {{ number_format($item['price'], 2) }}৳
                                                    </span>
                                                    <br>

                                                    @if($discountAmount > 0)
                                                        <span class="text-success small">
                                                            Saved {{ number_format($discountAmount, 2) }}৳
                                                        </span>
                                                        <br>
                                                    @endif

                                                    <span class="price-normal fw-bold">
                                                        {{ number_format($item['discount_price'], 2) }}৳
                                                    </span>
                                                @else
                                                    {{ number_format($item['price'], 2) }}৳
                                                @endif
                                            </td>
                                            <td class="text-center td-total" data-title="Subtotal">{{ $item['subtotal'] }}৳</td>
                                        </tr>
                                    @endforeach       
                                </tbody>
                            </table>
                        @else
                            <p class="text-center">Your shopping cart is empty!</p>
                        @endif     
                    </div>
                </form>
                <div class="cart-bottom">
                    <div class="panels-total">
                        <div class="cart-total">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-right"><strong>Sub-Total:</strong></td>
                                        <td class="text-right">{{ $totalPrice }}৳</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Total:</strong></td>
                                        <td class="text-right">{{ $totalPrice }}৳</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-left">
                            <a href="{{ url('/') }}" class="btn btn-default"><span>Continue Shopping</span></a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('cart.cart-checkout') }}" class="btn btn-primary"><span>Checkout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="bottom" class="bottom top-row">
    <div class="grid-rows">
        <div class="grid-row grid-related-bottom">
            <div class="grid-cols">
                <div class="grid-col grid-col-bottom-1-2">
                    <div class="grid-items">
                        <div class="grid-item grid-item-bottom-1-2-1">
                            <div class="module module-products cart-module-products-1 module-products-grid carousel-mode">
                                <div class="module-body">
                                        <div id="responsiveCarousel" class="carousel slide" data-ride="carousel">
                                            <ul class="nav nav-tabs">
                                                <li class="tab-1 active">
                                                        <a href="#products-68a923c5b8c63-tab-1" data-toggle="tab">Popular Combos</a>
                                                    </li>
                                            </ul>
                                            <div class="carousel-inner product-grid">

                                                 @foreach($relatedProducts->chunk(4) as $chunkIndex => $chunk)
                                                <div class="item {{ $chunkIndex == 0 ? 'active' : '' }}">
                                                    @foreach($chunk as $product)
                                                    <div class="col-xs-12 col-sm-6 col-md-3 product-wrapper">
                                                        <div class="product-layout product">
                                                            <div class="product-thumb">
                                                                <div class="image">
                                                                    <a href="{{ url('product/'.$product->slug) }}" class="product-img has-second-image">
                                                                        <div>
                                                                            <img
                                                                                src="{{ asset('public/'. $product->first_image_url) }}"
                                                                                srcset="{{ asset('public/'. $product->first_image_url) }}"
                                                                                width="250" height="250" alt="{{ $product->name }}" title="{{ $product->name }}"
                                                                                class="img-responsive img-first"/>

                                                                            <img src="{{ asset('public/'. $product->second_image_url) }}"
                                                                                srcset="{{ asset('public/'. $product->second_image_url) }}" width="250" height="250"
                                                                                alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive img-second"
                                                                            />
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                
                                                                <div class="caption">
                                                                    <div class="name"><a href="{{ url('product/'.$product->slug) }}">{{ $product->name }}</a></div>
                                                                    @if(!$product->no_sale_price)
                                                                        <div class="price">
                                                                            <div>
                                                                                <span class="price-normal">{{ $product->sale_price }}৳</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="buttons-wrapper">
                                                                            <div class="button-group">
                                                                                <div class="cart-group">
                                                                                    <div class="stepper">
                                                                                        <input type="text" name="quantity" value="1" id="product-quantity-{{ $product->id }}" data-minimum="1" class="form-control" />
                                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                                                        <span>
                                                                                            <i class="fa fa-angle-up"></i>
                                                                                            <i class="fa fa-angle-down"></i>
                                                                                        </span>
                                                                                    </div>

                                                                                    <div>
                                                                                        <a class="btn btn-cart" data-id="{{ $product->id }}" onclick="addToCart({{ $product->id }})" >
                                                                                            <span class="btn-text">Add to Cart</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="wish-group">
                                                                                    <a class="btn btn-wishlist" data-id="{{ $product->id }}" data-toggle="tooltip" onclick="addTowishlist({{ $product->id }})" data-original-title="Add to Wish List">
                                                                                        <span class="btn-text">Add to Wish List</span>
                                                                                    </a>

                                                                                    <a class="btn btn-compare" data-id="{{ $product->id }}" data-toggle="tooltip"
                                                                                        data-tooltip-class="cart-module-products-1 module-products-grid compare-tooltip"
                                                                                        data-placement="top" 
                                                                                        onclick="addCompareList({{ $product->id }})"
                                                                                        data-original-title="Compare this Product" >
                                                                                        <span class="btn-text">Compare this Product</span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="price">
                                                                            <div>
                                                                                <span class="price-normal">Price on Request</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-center mt-2">
                                                                            <button class="btn btn-cart" data-toggle="modal" data-target="#whatsappModal" data-product="{{ $product->name }}">
                                                                                <svg fill="#FFFFFF" width="15px" height="15px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"></path>
                                                                                </svg> &nbsp;
                                                                                Contact via WhatsApp
                                                                            </button>
                                                                        </div>
                                                                    @endif    
                                                                </div>    
                                                                
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    
                                                @endforeach
                                                </div>
                                                @endforeach

                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection