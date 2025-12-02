@extends('layouts.frontend')

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
                                            <td class="text-center td-image">
                                                <a href="{ $item['url'] }}">
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" title="{{ $item['name'] }}" width="60" />
                                                </a>
                                            </td>
                                            <td class="text-left td-name">
                                                <a href="{ $item['url'] }}">{{ $item['name'] }}</a>
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
                                                @if($item['discount_percent'] > 0)
                                                    <span class="text-decoration-line-through">
                                                        {{ number_format($item['price'], 2) }}৳
                                                    </span>
                                                    <br>
                                                    <span class="price-normal">
                                                        {{ number_format($item['discount_price'], 2) }}৳
                                                @else
                                                    {{ $item['price'] }}৳
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
        <div class="grid-row grid-row-bottom-1">
            <div class="grid-cols">
                <div class="grid-col grid-col-bottom-1-2">
                    <div class="grid-items">
                        <div class="grid-item grid-item-bottom-1-2-1">
                            <div class="module module-products module-products-262 module-products-grid carousel-mode">
                                <div class="module-body">
                                        <div id="responsiveCarousel" class="carousel slide" data-ride="carousel">
                                            <ul class="nav nav-tabs">
                                                <li class="tab-1 active">
                                                        <a href="#products-68a923c5b8c63-tab-1" data-toggle="tab">Purchased together</a>
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
                                                                                    data-tooltip-class="module-products-262 module-products-grid compare-tooltip"
                                                                                    data-placement="top" 
                                                                                    onclick="addCompareList({{ $product->id }})"
                                                                                    data-original-title="Compare this Product" >
                                                                                    <span class="btn-text">Compare this Product</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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