@php
    $routeName = Route::currentRouteName();
    $customerPage = in_array($routeName, ['customer.login', 'customer.register']);
    $NotLeftMenuRoute = in_array($routeName, ['customer.login', 'customer.register', 'customer.dashboard', 'category.show', 'category.sub.show', 'slug-product', 'contact.index', 'cart.view-cart', 'cart.cart-checkout', 'compare', 'wishlist', 'customer.address', 'customer.new_address', 'customer.edit_address', 'customer.order', 'order.success', 'customer.order_details', 'customer.order_return', 'customer.return', 'customer.edit_info', 'customer.password.request', 'customer.password.change', 'customer.password.reset', 'clearance.outlet', 'offer.zone']);
    $onlyCategory = in_array($routeName, ['category.show']);
    $onlyContact = in_array($routeName, ['contact.index']);
    $onlyCart = in_array($routeName, ['cart.view-cart', 'cart.cart-checkout']);
@endphp
<!doctype html>
@if($customerPage)
    <html lang="en" class="desktop route-product-product boxed-layout desktop-header-active mobile-sticky layout-2 one-column column-left  no-touchevents no-touchevents">
@elseif($onlyCategory)
<html lang="en" class="route-common-home route-product-product boxed-layout mobile-sticky layout-1 one-column column-left no-touchevents"> 
@elseif($onlyContact)
<html class="desktop route-information-contact boxed-layout desktop-header-active mobile-sticky layout-8 no-touchevents">
@elseif($onlyCart)
<html class="desktop route-checkout-cart boxed-layout desktop-header-active mobile-sticky layout-7 no-touchevents">           
@else
    <html lang="en" class="route-common-home route-product-product boxed-layout mobile-sticky layout-1 one-column column-left no-touchevents">
@endif

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700%7COswald:400&subset=latin-ext">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/font-awesome.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.minimal.css') }}">
    @if (Route::currentRouteName() === 'slug-product')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/imagezoom.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/lightgallery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/swiper.min.css') }}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/main.style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/master.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/mobile-container.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/header.css') }}">
    @include('frontend.partials.top_script')
    <script src="{{ asset('public/frontend/js/modernizr-custom.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('public/frontend/js/jquery-2.1.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('public/frontend/js/common.js') }}" crossorigin="anonymous"></script>
    @yield('styles')
    <title>Radio Electric BD</title>
  </head>
  <body>
    <div class="mobile-container mobile-main-menu-container">
		<div class="mobile-wrapper-header">
			<span>Menu</span>
			<a class="x"></a>
		</div>
		<div class="mobile-main-menu-wrapper"></div>
	</div>

	<div class="mobile-container mobile-filter-container">
		<div class="mobile-wrapper-header"></div>
		<div class="mobile-filter-wrapper"></div>
	</div>

	<div class="mobile-container mobile-cart-content-container">
		<div class="mobile-wrapper-header">
			<span>Your Cart</span>
			<a class="x"></a>
		</div>
		<div class="mobile-cart-content-wrapper cart-content"></div>
	</div>

	<div class="site-wrapper">
		
    @include('frontend.partials.header')

    @if(!request()->is(''))
        @php $items = $breadcrumbs ?? []; @endphp

        @if(count($items))
            <ul class="breadcrumb">
                <li>
                    <a href="{{ url('') }}">
                        <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            width="18px" height="18px" viewBox="0 0 495.398 495.398"
                            xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391
                                        v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158
                                        c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747
                                        c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z"/>
                                    <path d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401
                                        c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79
                                        c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z"/>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </a>
                </li>
                @foreach($items as $bc)
                    <li>
                        @if(!empty($bc['url']))
                            <a href="{{ $bc['url'] }}">{{ $bc['title'] }}</a>
                        @else
                            {{ $bc['title'] }}
                        @endif
                    </li>
                @endforeach
                @if($onlyCategory)
                    @include('frontend.partials.sub-category', ['subcategories' => $subcategories, 'slug'=> $slug])
                @endif
            </ul>
        @endif
    @endif

    @include('frontend.partials.flash-message')

    @unless($NotLeftMenuRoute)
		<div id="common-home" class="container">
			<div class="row">
              @include('frontend.partials.left-menu', ['featuredProducts' => $featuredProducts])
    @endunless          
          @yield('content')
    @unless($NotLeftMenuRoute)   
      </div>
		</div>
    @endunless
    @include('frontend.partials.footer')
		
	</div> 
    
    @include('frontend.partials.price_request_modal')
    @include('frontend.partials.modal')

    <script src="{{ asset('public/frontend/js/anime.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/lazyload.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/typeahead.jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.hoverIntent.min.js') }}"></script>
    @if (Route::currentRouteName() === 'slug-product')
    <script src="{{ asset('public/frontend/js/jquery.imagezoom.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('public/frontend/js/swiper.min.js') }}"></script>
    @endif
    <script src="{{ asset('public/frontend/js/master.js') }}"></script>
    <script src="{{ asset('public/frontend/js/sa_cart.js') }}"></script>
    @yield('scripts')
    <script>
        window.Laravel = {
            cartViewUrl: "{{ url('/cart/view') }}",
            cartCheckoutUrl: "{{ url('/cart/checkout') }}"
        };
    </script>
    <script>
        $(document).ready(function() {
            updateCartDropdown();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var baseUrl = "{{ rtrim(url('/'), '/') }}";

        $('.carousel').carousel({
            interval: 2000
        });

        $(document).on('click', '.btn-quickview', function() {
            var productId = $(this).data('id');
            
            console.log('productId ', productId);
            console.log(baseUrl + '/single-product/' + productId);

            $('#quickViewModal').modal('show');
            $("#modalContent .modal-img-wrap").html('<div class="text-center">Loading...</div>');

            $.ajax({
                url: baseUrl+'/single-product/'+ productId,
                type: 'GET',
                success: function(response) {
                    if(response.no_sale_price){
                        $('#modal-button-group-page, #modal-product-price-group, #modal-price-span-li').hide();
                        $('#modal-contact-whatsapp-box').show();
                    }else{
                        $('#modal-button-group-page, #modal-product-price-group, #modal-price-span-li').show();
                        $('#modal-contact-whatsapp-box').hide();
                    }
                    var img_append = `<img src="${baseUrl+'/public/'+response.first_image_url}" class="img-responsive" alt="">`;
                    var product_name = `<h3>${response.name}</h3>`;
                    $("#modalContent .modal-img-wrap").empty().append(img_append);
                    $("#modalContent #product .page-title").empty().append(product_name);
                    $("#modalContent #product #mp_price, #modalContent #product .product-price").empty().text(response.sale_price+'৳');
                    $("#modalContent #product #mp_stock_status").empty().text(response.stock_status? 'In stock': 'Out Of Stock');
                    $("#modalContent #product #mp_product_code").empty().text(response.product_code);
                    $("#modalContent #product #mp_product_mode").empty().text(response.model);
                    $("#modalContent #product #product_id").val(response.id);

                    $("#modalContent #button-cart").attr("data-id", response.id);
                    $("#modalContent .btn-extra-46").attr("data-id", response.id);
                    $("#modalContent .btn-wishlist").attr("data-id", response.id);
                    $("#modalContent .btn-compare").attr("data-id", response.id);

                    $("#modalContent #button-cart").attr("onclick", "addToCart("+response.id+", 'modal')");
                    $("#modalContent .btn-extra-46").attr("onclick", "buyNowClicked("+response.id+", 'modal')");
                    $("#modalContent .btn-wishlist").attr("onclick", "addTowishlist("+response.id+", 'modal')");
                    $("#modalContent .btn-compare").attr("onclick", "addCompareList("+response.id+", 'modal')");
                    $("#modalContent #product-quantity").attr("id", "product-quantity-" + response.id);

                    
                },
                error: function() {
                    $('#modalContent').html('<div class="text-center text-danger">Failed to load data</div>');
                }
            });
        });
    </script>
  </body>
</html>