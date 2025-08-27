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
                            alt="CityTech BD"
                            title="CityTech BD"
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
                            <a href="tel:{{ $generalSettings->phone }}">
                                <span class="links-text">Special Offers<s>Big Discount</s></span>
                            </a>
                        </li>

                        <li class="menu-item top-menu-item top-menu-item-5">
                            <a>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20px" height="20px"><path d="M598.1 139.4C608.8 131.6 611.2 116.6 603.4 105.9C595.6 95.2 580.6 92.8 569.9 100.6L495.4 154.8L485.5 148.2C465.8 135 442.6 128 418.9 128L359.7 128L359.3 128L215.7 128C189 128 163.2 136.9 142.3 153.1L70.1 100.6C59.4 92.8 44.4 95.2 36.6 105.9C28.8 116.6 31.2 131.6 41.9 139.4L129.9 203.4C139.5 210.3 152.6 209.3 161 201L164.9 197.1C178.4 183.6 196.7 176 215.8 176L262.1 176L170.4 267.7C154.8 283.3 154.8 308.6 170.4 324.3L171.2 325.1C218 372 294 372 340.9 325.1L368 298L465.8 395.8C481.4 411.4 481.4 436.7 465.8 452.4L456 462.2L425 431.2C415.6 421.8 400.4 421.8 391.1 431.2C381.8 440.6 381.7 455.8 391.1 465.1L419.1 493.1C401.6 503.5 381.9 509.8 361.5 511.6L313 463C303.6 453.6 288.4 453.6 279.1 463C269.8 472.4 269.7 487.6 279.1 496.9L294.1 511.9L290.3 511.9C254.2 511.9 219.6 497.6 194.1 472.1L65 343C55.6 333.6 40.4 333.6 31.1 343C21.8 352.4 21.7 367.6 31.1 376.9L160.2 506.1C194.7 540.6 241.5 560 290.3 560L342.1 560L343.1 561L344.1 560L349.8 560C398.6 560 445.4 540.6 479.9 506.1L499.8 486.2C501 485 502.1 483.9 503.2 482.7C503.9 482.2 504.5 481.6 505.1 481L609 377C618.4 367.6 618.4 352.4 609 343.1C599.6 333.8 584.4 333.7 575.1 343.1L521.3 396.9C517.1 384.1 510 372 499.8 361.8L385 247C375.6 237.6 360.4 237.6 351.1 247L307 291.1C280.5 317.6 238.5 319.1 210.3 295.7L309 197C322.4 183.6 340.6 176 359.6 175.9L368.1 175.9L368.3 175.9L419.1 175.9C433.3 175.9 447.2 180.1 459 188L482.7 204C491.1 209.6 502 209.3 510.1 203.4L598.1 139.4z"/></svg>
                                <span class="links-text">Make A deal<s>bussiness</s></span>
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
                            <span class="links-text">Shop By Category</span>
                            <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-68a48eab918cb"><i class="fa fa-plus"></i></span>
                        </a>
                        <div class="dropdown-menu j-dropdown" id="collapse-68a48eab918cb">
                            <div id="flyout-menu-68a47950ef24c" class="flyout-menu flyout-menu-7">
                                <ul class="j-menu">
                                    @foreach($menuCategories as $category)
                                        @if($category->children->count())                                    
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $category->id }} multi-level dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 640 640"><path d="M320.1 32C329.1 32 337.4 37.1 341.5 45.1L415 189.3L574.9 214.7C583.8 216.1 591.2 222.4 594 231C596.8 239.6 594.5 249 588.2 255.4L473.7 369.9L499 529.8C500.4 538.7 496.7 547.7 489.4 553C482.1 558.3 472.4 559.1 464.4 555L320.1 481.6L175.8 555C167.8 559.1 158.1 558.3 150.8 553C143.5 547.7 139.8 538.8 141.2 529.8L166.4 369.9L52 255.4C45.6 249 43.4 239.6 46.2 231C49 222.4 56.3 216.1 65.3 214.7L225.2 189.3L298.8 45.1C302.9 37.1 311.2 32 320.2 32zM320.1 108.8L262.3 222C258.8 228.8 252.3 233.6 244.7 234.8L119.2 254.8L209 344.7C214.4 350.1 216.9 357.8 215.7 365.4L195.9 490.9L309.2 433.3C316 429.8 324.1 429.8 331 433.3L444.3 490.9L424.5 365.4C423.3 357.8 425.8 350.1 431.2 344.7L521 254.8L395.5 234.8C387.9 233.6 381.4 228.8 377.9 222L320.1 108.8z"/></svg>
                                                    <span class="links-text">{{ $category->name }}</span>
                                                    <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-{{ $category->id }}"><i class="fa fa-plus"></i></span>
                                                </a>
                                                <div class="dropdown-menu j-dropdown" id="collapse-{{ $category->id }}">
                                                    <ul class="j-menu">
                                                        @foreach($category->children as $sub)
                                                            <li class="menu-item menu-item-c278">
                                                                <a href="#"><span class="links-text">{{ $sub->name }}</span></a>
                                                            </li>
                                                        @endforeach    
                                                    </ul>
                                                </div>
                                            </li>
                                        @else 
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $category->id }} multi-level">
                                                <a href="{{ url('category/'.$category->slug) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 640 640"><path d="M320.1 32C329.1 32 337.4 37.1 341.5 45.1L415 189.3L574.9 214.7C583.8 216.1 591.2 222.4 594 231C596.8 239.6 594.5 249 588.2 255.4L473.7 369.9L499 529.8C500.4 538.7 496.7 547.7 489.4 553C482.1 558.3 472.4 559.1 464.4 555L320.1 481.6L175.8 555C167.8 559.1 158.1 558.3 150.8 553C143.5 547.7 139.8 538.8 141.2 529.8L166.4 369.9L52 255.4C45.6 249 43.4 239.6 46.2 231C49 222.4 56.3 216.1 65.3 214.7L225.2 189.3L298.8 45.1C302.9 37.1 311.2 32 320.2 32zM320.1 108.8L262.3 222C258.8 228.8 252.3 233.6 244.7 234.8L119.2 254.8L209 344.7C214.4 350.1 216.9 357.8 215.7 365.4L195.9 490.9L309.2 433.3C316 429.8 324.1 429.8 331 433.3L444.3 490.9L424.5 365.4C423.3 357.8 425.8 350.1 431.2 344.7L521 254.8L395.5 234.8C387.9 233.6 381.4 228.8 377.9 222L320.1 108.8z"/></svg>
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
                        <div class="header-search">
                            <span class="twitter-typeahead">
                                <input type="text" value="" class="search-input tt-hint"
                                    data-category_id=""
                                    readonly=""
                                    autocomplete="off"
                                    spellcheck="false"
                                    tabindex="-1"
                                    dir="ltr"
                                />
                                <input  type="text" name="search" value=""
                                    placeholder="Search..."
                                    class="search-input tt-input"
                                    data-category_id=""
                                    autocomplete="off"
                                    spellcheck="false"
                                    dir="auto"
                                />
                                <pre aria-hidden="true"
                                    style='position: absolute; visibility: hidden; white-space: pre; font-family: "IBM Plex Sans"; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;'
                                ></pre>
                                <div class="tt-menu tt-empty"><div class="tt-dataset tt-dataset-0"></div></div>
                            </span>
                            <button type="button" class="search-button" data-search-url=""></button>
                        </div>
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
                        <ul>
                            <li class="cart-products">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-center td-image">
                                                <a href="#">
                                                    <img
                                                        src="https://www.citytechbd.com/image/cache/catalog/Autonics-Temperature-Controller-Autonics-TCN4S-24R-price-in-bd-citytech-bd-60x60.JPG"
                                                        alt="Autonics Temperature Controller Autonics TCN4S-24R"
                                                        title="Autonics Temperature Controller Autonics TCN4S-24R"
                                                    />
                                                </a>
                                            </td>
                                            <td class="text-left td-name"><a href="#">Autonics Temperature Controller Autonics TCN4S-24R</a><br /></td>
                                            <td class="text-right td-qty">x 1</td>
                                            <td class="text-right td-total">2,745৳</td>
                                            <td class="text-center td-remove">
                                                <button type="button" onclick="cart.remove('17020');" title="Remove" class="cart-remove"><i class="fa fa-times-circle"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li class="cart-totals">
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-right td-total-title">Sub-Total</td>
                                                <td class="text-right td-total-text">2,745৳</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right td-total-title">Total</td>
                                                <td class="text-right td-total-text">2,745৳</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="cart-buttons">
                                        <a class="btn-cart btn" href="#"><i class="fa"></i><span>View Cart</span></a>
                                        <a class="btn-checkout btn" href="#"><i class="fa"></i><span>Checkout</span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <!-- <ul>
                            <li>
                                <p class="text-center cart-empty">Your shopping cart is empty!</p>
                            </li>
                        </ul> -->
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