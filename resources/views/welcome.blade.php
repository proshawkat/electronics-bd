@extends('layouts.frontend')

@section('content')   
    <div id="content" class="col-sm-9">
        <div id="content-top">
            <div class="grid-rows">
                <div class="grid-row grid-row-content-top-1">
                    <div class="grid-cols">
                        <div class="grid-col grid-col-content-top-1-1">
                            <div class="grid-items">
                                <div class="grid-item grid-item-content-top-1-1-1">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            @foreach($sliders as $key => $slider)
                                                <div class="item {{ $key == 0 ? 'active' : '' }}">
                                                    <a href="{{ $slider->link ?? '#' }}">
                                                        <img src="{{ asset('public/'.$slider->image_url) }}" alt="Slide {{ $key+1 }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-row grid-row-content-top-2">
                    <div class="grid-cols">
                        <div class="grid-col grid-col-content-top-2-1">
                            <div class="grid-items">
                                <div class="grid-item grid-item-content-top-2-1-1">
                                    <div class="module module-products module-products-302 module-products-grid">
                                        <div class="module-body">
                                            <div class="module-item module-item-1">
                                                <h3 class="title module-title">Accessories Deals</h3>
                                                <div class="row product-grid main-products model-content">
                                                    @foreach($homeProducts as $product)
                                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                                            <div class="product-layout has-extra-button">
                                                                <div class="product-thumb">
                                                                    <div class="image">
                                                                        <div class="quickview-button">
                                                                            <a class="btn btn-quickview" data-toggle="tooltip" data-tooltip-class="module-products-302 module-products-grid quickview-tooltip" data-placement="top" title="" onclick="quickview('2053')" data-original-title="Quickview">
                                                                                <span class="btn-text">Quickview</span>
                                                                            </a>
                                                                        </div>

                                                                        <a href="{{ url('product/'.$product->slug) }}" class="product-img has-second-image">
                                                                            <div>
                                                                                <img src="{{ asset('public/'.$product->first_image_url) }}"
                                                                                    srcset="{{ asset('public/'.$product->first_image_url) }}" width="250" height="250"
                                                                                    alt="{{ $product->name }}" title="{{ $product->name }}"
                                                                                    class="img-responsive img-first" />

                                                                                <img src="{{ asset('public/'.$product->second_image_url) }}" srcset="{{ asset('public/'.$product->second_image_url) }}" width="250" height="250" alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive img-second" />
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                    <div class="caption">
                                                                        <div class="name">
                                                                            <a class="truncate-text" href="#">
                                                                                {{ $product->name }}
                                                                            </a>
                                                                        </div>

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
                                                                                        <a class="btn btn-wishlist" data-id="{{ $product->id }}" onclick="addTowishlist({{ $product->id }})" data-original-title="Add to Wish List">
                                                                                            <span class="btn-text">Add to Wish List</span>
                                                                                        </a>

                                                                                        <a class="btn btn-compare" data-id="{{ $product->id }}" data-toggle="tooltip" data-tooltip-class="product-grid compare-tooltip" data-placement="top" title="" onclick="addCompareList({{ $product->id }})">
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
    </div>			
@endsection    