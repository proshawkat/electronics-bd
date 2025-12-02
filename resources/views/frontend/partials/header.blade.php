<header class="header-mega">
    <div class="header header-mega header-lg">
        <div class="top-bar navbar-nav">
            <div class="language-currency top-menu">
                <div class="desktop-language-wrapper"></div>
                <div class="desktop-currency-wrapper">
                    <div id="currency" class="currency">
                        <form method="post" enctype="multipart/form-data" id="form-currency">
                            <div class="dropdown drop-menu">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="currency-symbol-title">
                                        <span class="symbol">৳</span>
                                        <span class="currency-title">Taka</span>
                                        <span class="currency-code">BDT</span>
                                    </span>
                                </button>
                            </div>
                            <input type="hidden" name="code" value="" />
                            <input type="hidden" name="redirect" value="#" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="third-menu"></div>
        </div>
        <div class="mid-bar navbar-nav">
            <div class="desktop-logo-wrapper">
                <div id="logo">
                    <a href="{{ route('home') }}">
                        <img
                            src="{{ asset('public/'.$generalSettings->logo) }}"
                            srcset="{{ asset('public/'.$generalSettings->logo) }} 1x, {{ asset('public/'.$generalSettings->logo) }} 2x"
                            width="1737"
                            height="261"
                            alt="RadioElectric BD"
                            title="RadioElectric BD"
                        />
                    </a>
                </div>
            </div>
            <div class="top-menu secondary-menu">
                <div class="top-menu top-menu-14">
                    <ul class="j-menu">
                        <li class="menu-item top-menu-item top-menu-item-1">
                            <a href="{{ $generalSettings->facebook }}">
                                <span class="links-text">Facebook <s>follow us </s></span>
                            </a>
                        </li>

                        <li class="menu-item top-menu-item top-menu-item-2">
                            <a href="tel:{{ $generalSettings->phone }}">
                                <span class="links-text">Call us<s>{{ $generalSettings->phone }}</s></span>
                            </a>
                        </li>

                        <li class="menu-item top-menu-item top-menu-item-3">
                            <a href="{{ route('clearance.outlet') }}">
                                <span class="links-text">CLEARENCE <s>OUTLET</s></span>
                            </a>
                        </li>
                        
                        <li class="menu-item top-menu-item top-menu-item-4">
                            <a href="{{ route('offer.zone') }}">
                                <span class="links-text">OFFER <s>ZONE</s></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="desktop-main-menu-wrapper menu-default has-menu-2 navbar-nav">
            <div class="menu-trigger menu-item main-menu-item">
                <ul class="j-menu">
                    <li><a>Menu</a></li>
                </ul>
            </div>
            <div id="main-menu" class="main-menu main-menu-219">
                <ul class="j-menu">
                    <li class="menu-item main-menu-item main-menu-item-1 dropdown flyout drop-menu first-dropdown" data-is-open="">
                        <a class="dropdown-toggle" data-toggle="" aria-expanded="false">
                            <span class="links-text">Browse by Category</span>
                            <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-68a48eab918cb"><i class="fa fa-plus"></i></span>
                        </a>
                        <div class="dropdown-menu j-dropdown" id="collapse-68a48eab918cb">
                            <div id="flyout-menu-68a47950ef24c" class="flyout-menu flyout-menu-7">
                                <ul class="j-menu">
                                    @foreach($menuCategories as $category)
                                        @if($category->children->count())                                    
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $category->id }} multi-level dropdown">
                                                <a href="{{ route('category.show', $category->slug) }}" class="dropdown-toggle" data-toggle="dropdown">
                                                    <svg width="15px" height="15px" viewBox="-19.04 0 75.804 75.804" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="Group_65" data-name="Group 65" transform="translate(-831.568 -384.448)">
                                                            <path id="Path_57" data-name="Path 57" d="M833.068,460.252a1.5,1.5,0,0,1-1.061-2.561l33.557-33.56a2.53,2.53,0,0,0,0-3.564l-33.557-33.558a1.5,1.5,0,0,1,2.122-2.121l33.556,33.558a5.53,5.53,0,0,1,0,7.807l-33.557,33.56A1.5,1.5,0,0,1,833.068,460.252Z" fill="#000000"/>
                                                        </g>
                                                    </svg>
                                                    <span class="links-text">{{ $category->name }}</span>
                                                    <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-{{ $category->id }}"><i class="fa fa-plus"></i></span>
                                                </a>
                                                <div class="dropdown-menu j-dropdown" id="collapse-{{ $category->id }}">
                                                    <ul class="j-menu">
                                                        @foreach($category->children as $sub)
                                                            <li class="menu-item menu-item-c278">
                                                                <a href="{{ route('category.sub.show', [$category->slug, $sub->slug]) }}"><span class="links-text">{{ $sub->name }}</span></a>
                                                            </li>
                                                        @endforeach    
                                                    </ul>
                                                </div>
                                            </li>
                                        @else 
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $category->id }} multi-level">
                                                <a href="{{ url('category/'.$category->slug) }}">
                                                    <svg width="15px" height="15px" viewBox="-19.04 0 75.804 75.804" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="Group_65" data-name="Group 65" transform="translate(-831.568 -384.448)">
                                                            <path id="Path_57" data-name="Path 57" d="M833.068,460.252a1.5,1.5,0,0,1-1.061-2.561l33.557-33.56a2.53,2.53,0,0,0,0-3.564l-33.557-33.558a1.5,1.5,0,0,1,2.122-2.121l33.556,33.558a5.53,5.53,0,0,1,0,7.807l-33.557,33.56A1.5,1.5,0,0,1,833.068,460.252Z" fill="#000000"/>
                                                        </g>
                                                    </svg>
                                                    <span class="links-text">{{ $category->name }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach    
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="desktop-search-wrapper full-search default-search-wrapper">
                <div id="search" class="dropdown">
                    <button class="dropdown-toggle search-trigger" data-toggle="" aria-expanded="false"></button>
                    <div class="dropdown-menu j-dropdown">
                        <form action="{{ route('category.show', ['slug' => 'all-products']) }}" method="GET" class="header-search-form">
                            <div class="header-search">
                                <span class="twitter-typeahead">
                                    <input  type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Search products..."
                                        class="search-input tt-input"
                                        data-category_id=""
                                        autocomplete="off"
                                        spellcheck="false"
                                        dir="auto"
                                    />
                                    <div class="tt-menu tt-empty"><div class="tt-dataset tt-dataset-0"></div></div>
                                </span>
                                <button type="submit" class="search-button"></button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
            <div id="main-menu-2" class="main-menu main-menu-3">
                <ul class="j-menu">
                    <li class="menu-item main-menu-item main-menu-item-1 multi-level dropdown drop-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="links-text"></span>
                            <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-68a48eab91cc5"><i class="fa fa-plus"></i></span>
                        </a>
                        <div class="dropdown-menu j-dropdown" id="collapse-68a48eab91cc5">
                            <ul class="j-menu">
                                @if(Auth::guard('customer')->check())
                                    <li class="menu-item main-menu-item-2 drop-menu">
                                        <a href="{{ route('customer.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="menu-item main-menu-item-3 drop-menu">    
                                        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>    
                                @else
                                    <li class="menu-item main-menu-item-2 drop-menu">
                                        <a href="{{ route('customer.login') }}">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"/>
                                            <path d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                            </svg>
                                            <span class="links-text">Log in</span>
                                        </a>
                                    </li>

                                    <li class="menu-item main-menu-item-3 drop-menu">
                                        <a href="{{ route('customer.register') }}">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 18L17 18M17 18L14 18M17 18V15M17 18V21M11 21H4C4 17.134 7.13401 14 11 14C11.695 14 12.3663 14.1013 13 14.2899M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#1C274C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="links-text">Register</span>
                                        </a>
                                    </li>
                                @endif     
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="desktop-cart-wrapper default-cart-wrapper">
                <div id="cart" class="dropdown">
                    <a data-toggle="" data-loading-text="Loading..." class="dropdown-toggle cart-heading" href="" aria-expanded="false">
                        <span id="cart-total">0 item(s) - 0৳</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20px" height="20px" class="icon-white"><path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z"/></svg>
                        <span id="cart-items" class="count-badge count-zero">0</span>
                    </a>
                    <div id="cart-content" class="dropdown-menu cart-content j-dropdown">
                        <ul class="cart-full-ul">
                            <li class="cart-products">
                                <table class="table">
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </li>
                            <li class="cart-totals">
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-right td-total-title">Sub-Total</td>
                                                <td class="text-right td-total-text">0৳</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right td-total-title">Total</td>
                                                <td class="text-right td-total-text">0৳</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="cart-buttons">
                                        <a class="btn-cart btn" href="{{ route('cart.view-cart') }}"><i class="fa"></i><span>View Cart</span></a>
                                        <a class="btn-checkout btn" href="{{ route('cart.cart-checkout') }}"><i class="fa"></i><span>Checkout</span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <ul class="cart-empty-ul">
                            <li>
                                <p class="cart-empty">Your shopping cart is empty!</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-header mobile-default mobile-1">
        <div class="mobile-top-bar">
            <div class="mobile-top-menu-wrapper">
                <div class="top-menu top-menu-13">
                    <ul class="j-menu">
                        @if(Auth::guard('customer')->check())
                            <li class="menu-item top-menu-item top-menu-item-1">
                                <a href="{{ route('customer.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="menu-item top-menu-item top-menu-item-2">    
                                <form action="{{ route('customer.logout') }}" method="POST">@csrf<button>Logout</button></form>
                            </li>    
                        @else
                            <li class="menu-item top-menu-item top-menu-item-1">
                                <a href="{{ route('customer.login') }}"><span class="links-text">Login</span></a>
                            </li>
                            <li class="menu-item top-menu-item top-menu-item-2">
                                <a href="{{ route('customer.register') }}"><span class="links-text">Register</span></a>
                            </li>    
                        @endif                
                    </ul>
                </div>
            </div>
            <div class="language-currency top-menu">
                <div class="mobile-currency-wrapper"></div>
                <div class="mobile-language-wrapper"></div>
            </div>
        </div>
        <div class="mobile-bar sticky-bar">
            <div class="mobile-logo-wrapper"></div>
            <div class="mobile-bar-group">
                <div class="menu-trigger"></div>
                <div class="mobile-search-wrapper mini-search"></div>
                <div class="mobile-cart-wrapper mini-cart"></div>
            </div>
        </div>
    </div>
</header>