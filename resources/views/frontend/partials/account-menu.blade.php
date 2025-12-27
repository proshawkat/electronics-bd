<aside id="column-right" class="side-column">
    <div class="grid-rows">
        <div class="grid-row grid-row-column-right-1">
            <div class="grid-cols">
                <div class="grid-col grid-col-column-right-1-1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-column-right-1-1-1">
                            <div class="accordion-menu accordion-menu-126">
                                <h3 class="title module-title">Account Menu</h3>
                                <ul class="j-menu">
                                    <li class="menu-item accordion-menu-item accordion-menu-item-1">
                                        <a href="{{ route('customer.dashboard') }}">
                                            <span class="links-text">My Account</span>
                                        </a>
                                    </li>

                                    <li class="menu-item accordion-menu-item accordion-menu-item-2">
                                        <a href="{{ route('customer.address') }}">
                                            <span class="links-text">Address Book</span>
                                        </a>
                                    </li>

                                    <li class="menu-item accordion-menu-item accordion-menu-item-3">
                                        <a href="{{ route('wishlist') }}"> <span class="links-text">Wishlist</span><span class="count-badge wishlist-badge count-zero">{{ $wishlistCount }}</span> </a>
                                    </li>

                                    <li class="menu-item accordion-menu-item accordion-menu-item-4">
                                        <a href="{{ route('customer.order') }}">
                                            <span class="links-text">Order History</span>
                                        </a>
                                    </li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>