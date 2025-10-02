@extends('layouts.frontend')

@section('content')
<div style="background:#fff;padding-bottom:2rem;">            
    <div class="product-info">
        <div class="product-left">
            <div class="product-image direction-vertical position-left additional-images-loaded">
                <div class="swiper main-image swiper-has-pages" data-options='{"speed":0,"autoplay":false,"pauseOnHover":false,"loop":false}' style="width: calc(100% - 80px)">
                    <div class="swiper-container swiper-container-horizontal">
                        <div class="swiper-wrapper" style="transform: translate3d(-1236px, 0px, 0px); transition-duration: 0ms;">
                            @foreach($product->galleries as $gallery)
                                <div class="swiper-slide" data-gallery=".lightgallery-product-images" data-index="0" style="width: 412px;">
                                    <img src="{{ asset('public/'.$gallery->original_url) }}"
                                        srcset="{{ asset('public/'.$gallery->original_url) }}"
                                        data-largeimg="{{ asset('public/'.$gallery->original_url) }}"
                                        alt="{{ $product->name }}" title="{{ $product->name }}" width="550" height="550" />
                                </div>
                            @endforeach 
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="swiper-controls">
                        <div class="swiper-buttons">
                            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>
                            <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button" aria-label="Next slide" aria-disabled="true"></div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
                            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
                            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 4"></span>
                        </div>
                    </div>
                </div>
                <div class="swiper additional-images" data-options='{"slidesPerView":"auto","spaceBetween":0,"direction":"vertical"}' style="width: 80px; height: 417px;">
                    <div class="swiper-container swiper-container-vertical">
                        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                            @foreach($product->galleries as $gallery)
                                <div class="swiper-slide additional-image swiper-slide-visible swiper-slide-active" data-index="{{ $loop->index }}">
                                    <img src="{{ asset('public/'.$gallery->original_url) }}"
                                        srcset="{{ asset('public/'.$gallery->original_url) }}"
                                        alt="{{ $product->name }}" title="{{ $product->name }}" width="80" height="80" />
                                </div>
                            @endforeach  
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="swiper-buttons">
                        <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                        <div class="swiper-button-next swiper-button-disabled" tabindex="0" role="button" aria-label="Next slide" aria-disabled="true"></div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                        <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                    </div>
                </div>
            </div>
            <div
                class="lightgallery lightgallery-product-images"
                data-images='{{ $galleryJsonString }}'
                data-options='{"thumbWidth":80,"thumbConHeight":80,"addClass":"lg-product-images","mode":"lg-slide","download":true,"fullScreen":false}'
            ></div>
        </div>
        <div class="product-right">
            <div id="product" class="product-details">
                <div class="title page-title" style="text-align: left;">{{ $product->name }}</div>

                <div class="product-stats">
                    <ul class="list-unstyled">
                        <li class="stats-itams"><b>Price:</b> <span> {{ $product->sale_price }}৳</span></li>

                        <li class="product-stock stats-itams in-stock"><b>Stock:</b> <span>{{ $product->stock_status == 1 ? 'In Stock' : 'Out of Stock' }}</span></li>

                        <li class="product-code stats-itams"><b>Product Code:</b> <span> {{ $product->product_code }}</span></li>

                        <li class="product-model stats-itams"><b>Model:</b> <span>{{ $product->model }}</span></li>
                    </ul>
                </div>

                <div class="rating rating-page">
                    <div class="rating-stars">
                        <span class="fa fa-stack">
                            <i class="fa fa-star-o fa-stack-1x"></i>
                        </span>
                        <span class="fa fa-stack">
                            <i class="fa fa-star-o fa-stack-1x"></i>
                        </span>
                        <span class="fa fa-stack">
                            <i class="fa fa-star-o fa-stack-1x"></i>
                        </span>
                        <span class="fa fa-stack">
                            <i class="fa fa-star-o fa-stack-1x"></i>
                        </span>
                        <span class="fa fa-stack">
                            <i class="fa fa-star-o fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="review-links">
                        <a>Based on 0 reviews.</a>
                        <b>-</b>
                        <a>Write a review</a>
                    </div>
                </div>

                <div class="product-price-group">
                    <div class="price-wrapper">
                        <div class="price-group">
                            <div class="product-price">{{ $product->sale_price }}৳</div>
                        </div>
                    </div>
                </div>

                <div class="button-group-page">
                    <div class="buttons-wrapper">
                        <div class="stepper-group cart-group model-content">
                            <div class="stepper">
                                <label class="control-label" for="product-quantity">Qty</label>
                                <input id="product-quantity-{{ $product->id }}" type="text" name="quantity" value="1" data-minimum="1" class="form-control" />
                                <input id="product-id" type="hidden" name="product_id" value="{{ $product->id }}" />
                                <span>
                                    <i class="fa fa-angle-up"></i>
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            </div>
                            <a id="button-cart" onclick="addToCart({{ $product->id }})" class="btn btn-cart"><span class="btn-text">Add to Cart</span></a>

                            <div class="extra-group">
                                <a class="btn btn-extra btn-extra-46 btn-1-extra" data-quick-buy="" onclick="buyNowClicked({{ $product->id }})"><span class="btn-text">Buy Now</span></a>
                                <a class="btn btn-extra btn-extra-93 btn-2-extra" href="javascript:open_popup(22)" data-product_id="1039" data-loading-text="&lt;span class='btn-text'&gt;Ask Question&lt;/span&gt;">
                                    <span class="btn-text">Ask Question</span>
                                </a>
                            </div>
                        </div>

                        <div class="wishlist-compare">
                            <a class="btn btn-wishlist" data-toggle="tooltip" data-tooltip-class="pp-wishlist-tooltip" data-placement="top" title="" onclick="addTowishlist({{ $product->id }})" data-original-title="Add to Wish List">
                                <span class="btn-text">Add to Wish List</span>
                            </a>

                            <a class="btn btn-compare" data-toggle="tooltip" data-tooltip-class="pp-compare-tooltip" data-placement="top" title="" onclick="addCompareList({{ $product->id }})" data-original-title="Compare this Product">
                                <span class="btn-text">Compare this Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="product-product" class="container">
    <div class="row">
        <div id="content" style="max-width:100%;">
            <div class="product-blocks blocks-default">
                <div class="product-blocks-default product-blocks-306 grid-rows">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="grid-items">
                                <div class="grid-item grid-item-306-1-1-1">
                                    <div class="module module-blocks module-blocks-307 blocks-grid">
                                        <div class="module-body">
                                            <div class="module-item module-item-2">
                                                <div class="block-body expand-block">
                                                    <h3 class="title module-title block-title">Description</h3>
                                                    <div class="block-wrapper">
                                                        <div class="block-content block-description">
                                                            {!! $product->description !!}    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="grid-items">
                                <div class="grid-item grid-item-306-1-2-1">
                                    <div class="module module-side_products module-side_products-151">
                                        <div class="module-body side-products-blocks">
                                            <div class="module-item module-item-1">
                                                <h3 class="title module-title">Related Product</h3>
                                                <div class="side-products">
                                                    @foreach($relatedProducts as $related)
                                                        <div class="product-layout">
                                                            <div class="side-product">
                                                                <div class="image">
                                                                    <a href="{{ url('product/'.$related->slug) }}" class="product-img">
                                                                        <img src="{{ asset('public/'.$related->first_image_url) }}"
                                                                            srcset="{{ asset('public/'.$related->first_image_url) }}"
                                                                            width="60" height="60" alt="{{ $related->name }}"
                                                                            title="{{ $related->name }}" class="img-first" />
                                                                    </a>

                                                                    <div class="quickview-button">
                                                                        <a class="btn btn-quickview" data-toggle="tooltip"
                                                                            data-tooltip-class="module-side_products-151 quickview-tooltip"
                                                                            data-placement="top"
                                                                            data-original-title="Quickview" data-placement="top" data-toggle="modal"  data-target="#quickViewModal" data-id="{{ $related->id }}">
                                                                            <span class="btn-text">Quickview</span>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="caption">
                                                                    <div class="name"><a href="{{ url('product/'.$related->slug) }}">{{ $related->name }}</a></div>

                                                                    <div class="price">
                                                                        <span class="price-normal">{{ $related->sale_price }}৳</span>
                                                                    </div>

                                                                    <div class="button-group">
                                                                        <a class="btn btn-cart" data-toggle="tooltip"
                                                                            data-tooltip-class="module-side_products-151 cart-tooltip"
                                                                            data-placement="top" title="" onclick=""
                                                                            data-loading-text="&lt;span class='btn-text'&gt;Add to Cart&lt;/span&gt;"
                                                                            data-original-title="Add to Cart" >
                                                                            <span class="btn-text">Add to Cart</span>
                                                                        </a>
                                                                        <a
                                                                            class="btn btn-wishlist"
                                                                            data-toggle="tooltip"
                                                                            data-tooltip-class="module-side_products-151 wishlist-tooltip"
                                                                            data-placement="top" title="" onclick=""
                                                                            data-original-title="Add to Wish List"
                                                                        >
                                                                            <span class="btn-text">Add to Wish List</span>
                                                                        </a>
                                                                        <a
                                                                            class="btn btn-compare"
                                                                            data-toggle="tooltip"
                                                                            data-tooltip-class="module-side_products-151 compare-tooltip"
                                                                            data-placement="top"
                                                                            title="" data-id="{{ $related->id }}"
                                                                            onclick=""
                                                                            data-original-title="Compare this Product" >
                                                                            <span class="btn-text">Compare this Product</span>
                                                                        </a>
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
</div>
@endsection