@extends('layouts.frontend')
@section('styles')
<style>
    .page-title{
        display: block !important;
    }
    .product-grid:not(.swiper-wrapper){
        display: initial;
    }
</style>
@endsection
@section('content')
<h1 class="title page-title"><span>Product Wishlist</span></h1>

<div id="product-compare" class="container">
	<div class="main-products product-grid model-content">
		<div id="content-1">
            <div class="main-products-wrapper">
                <div class="row">
                    @forelse($wishlists as $product)
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="product-layout has-extra-button">
                            <div class="product-thumb">
                                <div class="image">
                                    <div class="quickview-button">
                                        <a class="btn btn-quickview" data-toggle="tooltip" data-tooltip-class="product-grid quickview-tooltip" data-placement="top" title="" onclick="quickview('2099')" data-original-title="Quickview">
                                            <span class="btn-text">Quickview</span>
                                        </a>
                                    </div>

                                    <a href="{{ url('product/'.$product->slug) }}" class="product-img">
                                        <div>
                                            <img src="{{ asset('public/'. $product->first_image_url) }}"
                                                srcset="{{ asset('public/'. $product->first_image_url) }}"
                                                width="250"
                                                height="250"
                                                alt="{{ $product->name }}"
                                                title="{{ $product->name }}"
                                                class="img-responsive img-first"
                                            />
                                        </div>
                                    </a>
                                </div>

                                <div class="caption">
                                    <div class="stats">
                                        <span class="stat-1"><span class="stats-label">Stock:</span> <span>{{ $product->stock_status }}</span></span>
                                        <span class="stat-2"><span class="stats-label">Model:</span> <span>{{ $product->model }}</span></span>
                                    </div>

                                    <div class="name"><a href="{{ url('product/'.$product->slug) }}">{{ $product->name }}</a></div>

                                    <div>
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
                                                        <a class="btn btn-cart" data-id="{{ $product->id }}" onclick="addToCart({{ $product->id }})">
                                                            <span class="btn-text">Add to Cart</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="wish-group">
                                                    <a class="btn btn-compare" data-id="{{ $product->id }}" data-toggle="tooltip"
                                                        data-tooltip-class="product-grid compare-tooltip"
                                                        data-placement="top" title="" onclick="addCompareList({{ $product->id }})" data-original-title="Compare this Product" >
                                                        <span class="btn-text">Compare this Product</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12 text-center">
                        <p class="text-danger text-center">No products found in this category.</p>
                    </div>
                    @endforelse  
                </div>
            </div>    
        </div>
	</div>
</div>

@endsection