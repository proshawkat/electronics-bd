@extends('layouts.frontend')
@section('styles')
<style>
    .contact-whatsapp-box {
    padding: 15px;
    display: inline-block;
    text-align: center;
}
.contact-whatsapp-box img {
    transition: transform 0.3s ease;
}
.contact-whatsapp-box img:hover {
    transform: scale(1.05);
}
.contact-whatsapp-box a {
    font-size: 16px;
    text-decoration: none;
}
.contact-whatsapp-box a:hover {
    text-decoration: underline;
}

</style>
@endsection
@section('content')
<div style="background:#fff;padding-bottom:0rem;">            
    <div class="product-info has-delivery">
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
                        @if(!$product->no_sale_price)
                            <li class="stats-itams"><b>Price:</b> <span> {{ $product->sale_price }}৳</span></li>
                        @endif
                        <li class="product-stock stats-itams in-stock"><b>Stock:</b> <span>{{ $product->stock_status == 1 ? 'In Stock' : 'Out of Stock' }}</span></li>

                        <li class="product-model stats-itams"><b>Model:</b> <span>{{ $product->model }}</span></li>
                    </ul>
                </div>

                @if(!$product->no_sale_price)
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
                                </div>
                            </div>

                            <div class="wishlist-compare">
                                <a class="btn btn-wishlist" data-toggle="tooltip" data-tooltip-class="pp-wishlist-tooltip" data-placement="top" title="" onclick="addTowishlist({{ $product->id }})" data-original-title="Add to Wish List">
                                    <span class="btn-text">Add to Wish List</span>
                                </a>

                                <a class="btn btn-compare" data-toggle="tooltip" data-tooltip-class="pp-compare-tooltip" data-placement="top" onclick="addCompareList({{ $product->id }})" data-original-title="Compare this Product">
                                    <span class="btn-text">Compare this Product</span>
                                </a>
                            </div>
                        </div>
                        @if($product->offer)
                            <div class="pt-2 pb-2 text-center pr-color">
                                <p>* Minimum Quantity: {{ $product->offer->min_qty }}. Enjoy the offer.</p>
                            </div>
                        @endif    
                    </div>
                @else
                    <div>
                        @php
                            $adminNumber = $generalSettings->admin_whatsapp_number ?? '8801XXXXXXXXX';
                            $cleanNumber = preg_replace('/\D/', '', $adminNumber);

                            $message = urlencode("Hello! I'm interested in the product '{$product->name}'. Please share the price details.");
                            $whatsappLink = "https://wa.me/{$cleanNumber}?text={$message}";
                        @endphp

                        <div class="contact-whatsapp-box text-center mt-4">
                            <p class="fw-bold mb-2">To buy or get more details about this product, contact us on WhatsApp:</p>
                            
                            <div class="mb-3">
                                <img src="{{ asset('public/'.$generalSettings->whatsapp_qr_code) }}" 
                                    alt="WhatsApp QR" width="150" height="150" class="rounded shadow">
                            </div>

                            <p>
                                Or click here:
                                <br>
                                <a href="{{ $whatsappLink }}" target="_blank" class="btn btn-success border-radius">
                                    <svg fill="#FFFFFF" width="15px" height="15px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"></path>
                                    </svg> &nbsp; {{ $adminNumber }}
                                </a>
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="product-delivery">
            <div class="delivery-box">
                <div class="delivery-header">Delivery Info</div>
                <div class="delivery-item delivery-border-b">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512" class="delivery-icon" role="img"><path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"></path></svg>
                    <div class="delivery-text">
                        <div><span class="delivery-fw-semibold">Inside Dhaka:</span> 1-2 days</div>
                        <div><span class="delivery-fw-semibold">Express (Dhaka):</span> 24 hours<br><small>Order before 12.00PM</small></div>
                        <div class="delivery-mt-2"><span class="delivery-fw-semibold">Outside Dhaka:</span> 2-3 days</div>
                    </div>
                </div>
                <div class="delivery-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="delivery-icon" role="img"><path d="M312 24V34.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z"></path></svg>
                    <div class="delivery-text">Cash on delivery all over BD</div>
                </div>
            </div>

            <div class="delivery-box">
                <div class="delivery-header">Service</div>
                <div class="delivery-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" class="delivery-icon" role="img"><path d="M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z"></path></svg>
                    <div class="delivery-text">Safe &amp; secure payment</div>
                </div>
                <div class="delivery-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="delivery-icon" role="img"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8V444.8C394 378 431.1 230.1 432 141.4L256 66.8l0 0z"></path></svg>
                    <div class="delivery-text"><strong>30 Days Warranty</strong></div>
                </div>
            </div>

            <div class="delivery-box">
                <div class="delivery-header">Customer Support</div>
                <a href="tel:+8801974277797" class="delivery-item delivery-link text-gray">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="delivery-icon icon-lg" role="img"><path d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"></path></svg>
                    <div class="delivery-text">
                        <div class="delivery-phone">01974 277 797</div>
                        <small>10:00AM to 7:00PM (Friday Closed)</small>
                    </div>
                </a>
                
                <a href="https://wa.me/+8801974277797?text=https://www.bdtronics.com/fnirsi-dso152-portable-digital-oscilloscope-dso.html" target="_blank" rel="nofollow noopener noreferrer" class="delivery-item delivery-link text-whatsapp">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512" class="delivery-icon icon-lg" role="img"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>
                    <span class="delivery-text">WhatsApp</span>
                </a>

                <a @click.prevent="$dispatch('toggle-chat-widget');" href="#" class="delivery-item delivery-link text-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512" class="delivery-icon icon-lg" role="img"><path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z"></path></svg>
                    <span class="delivery-text">Chat with Us</span>
                </a>
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
                        <div class="col-sm-12">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($relatedProducts->count() > 0)
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="related-products-title">Related Products</h3>
            <div class="row">
                @foreach($relatedProducts as $related)
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="product-layout has-extra-button">
                        <div class="product-thumb">
                            <div class="image">
                                <div class="quickview-button">
                                    @if(!$related->no_sale_price)
                                        <a class="btn btn-quickview" data-toggle="modal" data-target="#quickViewModal" data-id="{{ $related->id }}">
                                            <span class="btn-text">Quickview</span>
                                        </a>
                                    @else
                                        <a class="btn btn-quickview" data-toggle="modal" data-target="#whatsappModal" data-id="{{ $related->id }}">
                                            <span class="btn-text">Contact via WhatsApp</span>
                                        </a>
                                    @endif
                                </div>
                                <a href="{{ url('product/'.$related->slug) }}" class="product-img has-second-image">
                                    <div>
                                        <img src="{{ asset('public/'.$related->first_image_url) }}"
                                            srcset="{{ asset('public/'.$related->first_image_url) }}" width="250" height="250"
                                            alt="{{ $related->name }}" title="{{ $related->name }}"
                                            class="img-responsive img-first" />
                                        <img src="{{ asset('public/'.$related->first_image_url) }}"
                                            width="250" height="250"
                                            alt="{{ $related->name }}" title="{{ $related->name }}"
                                            class="img-responsive img-second" />
                                    </div>
                                </a>
                            </div>
                            <div class="caption">
                                <div class="name">
                                    <a class="truncate-text" href="{{ url('product/'.$related->slug) }}">
                                        {{ $related->name }}
                                    </a>
                                </div>
                                <div>
                                    @if(!$related->no_sale_price)
                                        <div class="price">
                                            <div>
                                                <span class="price-normal">{{ $related->sale_price }}৳</span>
                                            </div>
                                        </div>
                                        <div class="buttons-wrapper">
                                            <div class="button-group">
                                                <div class="cart-group">
                                                    <div class="stepper">
                                                        <input type="text" name="quantity" value="1" id="related-quantity-{{ $related->id }}" data-minimum="1" class="form-control" />
                                                        <input type="hidden" name="product_id" value="{{ $related->id }}" />
                                                        <span>
                                                            <i class="fa fa-angle-up"></i>
                                                            <i class="fa fa-angle-down"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <a class="btn btn-cart" data-id="{{ $related->id }}" onclick="addToCart({{ $related->id }})">
                                                            <span class="btn-text">Add to Cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wish-group">
                                                    <a class="btn btn-wishlist" data-id="{{ $related->id }}" onclick="addTowishlist({{ $related->id }})" data-original-title="Add to Wish List">
                                                        <span class="btn-text">Add to Wish List</span>
                                                    </a>
                                                    <a class="btn btn-compare" data-id="{{ $related->id }}" onclick="addCompareList({{ $related->id }})">
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
                                            <button class="btn btn-cart" data-toggle="modal" data-target="#whatsappModal" data-product="{{ $related->name }}">
                                                <svg fill="#FFFFFF" width="15px" height="15px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"></path></svg> &nbsp;
                                                Contact via WhatsApp
                                            </button>
                                        </div>
                                    @endif
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
@endif
@endsection