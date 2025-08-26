@php
    $routeName = Route::currentRouteName();
    $customerPage = in_array($routeName, ['customer.login', 'customer.register']);
    $NotLeftMenuRoute = in_array($routeName, ['customer.login', 'customer.register', 'customer.dashboard']);
@endphp
<!doctype html>
@if($customerPage)
    <html lang="en" class="desktop win chrome chrome139 webkit oc30 is-guest route-product-product product-1039 store-0 skin-1 boxed-layout desktop-header-active mobile-sticky layout-2 one-column column-left flexbox no-touchevents flexbox no-touchevents">
@else
    <html lang="en" class="win chrome chrome139 webkit oc30 is-guest route-common-home store-0 skin-1 route-product-product boxed-layout mobile-sticky layout-1 one-column column-left flexbox no-touchevents">
@endif


  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700%7COswald:400&subset=latin-ext">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/font-awesome.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.minimal.css') }}">
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

    @if(!request()->is('/'))
        @php $items = $breadcrumbs ?? []; @endphp

        @if(count($items))
            <ul class="breadcrumb">
                @foreach($items as $bc)
                    <li>
                        @if(!empty($bc['url']))
                            <a href="{{ $bc['url'] }}">{{ $bc['title'] }}</a>
                        @else
                            {{ $bc['title'] }}
                        @endif
                    </li>
                @endforeach
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


    <script src="{{ asset('public/frontend/js/anime.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/lazyload.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/typeahead.jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/master.js') }}"></script>
    @yield('scripts')
    <script>
        $('.carousel').carousel({
            interval: 2000
        });
    </script>
  </body>
</html>