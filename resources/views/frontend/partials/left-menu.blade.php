<aside id="column-left" class="side-column">
    <div class="grid-rows">
        <div class="grid-row grid-row-column-left-1">
            <div class="grid-cols">
                <div class="grid-col grid-col-column-left-1-1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-column-left-1-1-1">
                            <div id="flyout-menu-68a47950ef24c" class="flyout-menu flyout-menu-7">
                                <ul class="j-menu">
                                    @foreach($menuCategories as $category)
                                        @if($category->children->count())
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $loop->iteration }} multi-level dropdown">
                                                <a href="{{ route('category.show', $category->slug) }}" class="dropdown-toggle" aria-expanded="false">
                                                    <svg width="15px" height="15px" viewBox="-19.04 0 75.804 75.804" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="Group_65" data-name="Group 65" transform="translate(-831.568 -384.448)">
                                                            <path id="Path_57" data-name="Path 57" d="M833.068,460.252a1.5,1.5,0,0,1-1.061-2.561l33.557-33.56a2.53,2.53,0,0,0,0-3.564l-33.557-33.558a1.5,1.5,0,0,1,2.122-2.121l33.556,33.558a5.53,5.53,0,0,1,0,7.807l-33.557,33.56A1.5,1.5,0,0,1,833.068,460.252Z" fill="#000000"/>
                                                        </g>
                                                    </svg>                                                    
                                                    <span class="links-text">{{ $category->name }}</span>
                                                    <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-{{ $category->id }}">
                                                        <i class="fa fa-plus"></i>
                                                    </span>
                                                </a>

                                                <div class="dropdown-menu j-dropdown" id="collapse-{{ $category->id }}">
                                                    <ul class="j-menu">
                                                        @foreach($category->children as $sub)
                                                            <li class="menu-item menu-item-c{{ $sub->id }}">
                                                                <a href="{{ route('category.sub.show', [$category->slug, $sub->slug]) }}">
                                                                    <span class="links-text">{{ $sub->name }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @else
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $loop->iteration }} multi-level">
                                                <a href="{{ route('category.show', $category->slug) }}">
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
                        
                        <div class="grid-item grid-item-column-left-1-1-4">
                            <div class="module module-button module-button-310">
                                <a class="btn">Featured Products</a>
                            </div>
                        </div>
                        <div class="grid-item grid-item-column-left-1-1-5">
                            <div class="module module-side_products module-side_products-151">
                                <div class="module-body side-products-blocks">
                                    <div class="module-item module-item-1">
                                        <div class="side-products">
                                            @foreach($featuredProducts as $product)
                                                <div class="product-layout">
                                                    <div class="side-product">
                                                        <div class="image">
                                                            <a href="{{ url('product/'.$product->slug) }}" class="product-img">
                                                                <img
                                                                    src="{{ asset('public/'.$product->first_image_url) }}"
                                                                    srcset="{{ asset('public/'.$product->first_image_url) }}" width="60" height="60" alt=""
                                                                    title=""
                                                                    class="img-first"
                                                                />
                                                            </a>

                                                            <div class="quickview-button">
                                                                <a class="btn btn-quickview" title="Quickview" data-original-title="Quickview" data-placement="top" data-toggle="modal"  data-target="#quickViewModal" data-id="{{ $product->id }}">
                                                                    <span class="btn-text">Quickview</span>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="caption">
                                                            <div class="name">
                                                                <a href="{{ url('product/'.$product->slug) }}">
                                                                    {{ $product->name }}
                                                                </a>
                                                            </div>
                                                            @if(!$product->no_sale_price)
                                                                <div class="price">
                                                                    <span class="price-normal">{{ $product->sale_price }}৳</span>
                                                                </div>
                                                            @else
                                                                <div class="price">
                                                                    <div>
                                                                        <span class="price-normal">Price on Request</span>
                                                                    </div>
                                                                </div>
                                                            @endif        
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
</aside>

