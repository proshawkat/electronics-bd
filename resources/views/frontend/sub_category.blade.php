@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <aside id="column-left" class="side-column">
            <div class="grid-rows">
                <div class="grid-row grid-row-column-left-1">
                    <div class="grid-cols">
                        <div class="grid-col grid-col-column-left-1-1">
                            <div class="grid-items">
                                <div class="grid-item grid-item-column-left-1-1-1">
                                    <div class="module module-filter module-filter-36">
                                        <div class="module-body">
                                            <div class="panel-group">
                                                <div class="module-item module-item-m text-only panel panel-active">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <a href="#filter-68a7fbe21c954-collapse-3" class="accordion-toggle" data-toggle="collapse" aria-expanded="false" data-filter="m">
                                                                Brands
                                                                <i class="fa fa-caret-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="panel-collapse collapse in" id="filter-68a7fbe21c954-collapse-3" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="filter-checkbox">
                                                                @foreach($brands as $brand)
                                                                    <label>
                                                                        <input type="checkbox" data-filter-trigger="" name="m" value="{{ $brand->id }}" {{ in_array($brand->id, explode(',', request('m'))) ? 'checked' : '' }} />
                                                                        <span class="links-text">{{ $brand->name }}</span>
                                                                    </label>
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
        </aside>
        
        <div id="content">
            <div class="main-products-wrapper">
                <div class="products-filter">
                    <div class="grid-list">
                        <h3>{{ $breadcrumbs[1]['title'] ?? 'Products' }}</h3>
                    </div>
                    <div class="select-group">
                        <div class="input-group input-group-sm sort-by">
                            <label class="input-group-addon" for="input-sort">Sort By:</label>
                            <select id="input-sort" class="form-control" onchange="location = this.value;">
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'p.sort_order','order'=>'ASC']) }}" {{ request('sort')=='p.sort_order' ? 'selected' : '' }}>Default</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'pd.name','order'=>'ASC']) }}" {{ request('sort')=='pd.name' && request('order')=='ASC' ? 'selected' : '' }}>Name (A - Z)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'pd.name','order'=>'DESC']) }}" {{ request('sort')=='pd.name' && request('order')=='DESC' ? 'selected' : '' }}>Name (Z - A)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'p.price','order'=>'ASC']) }}" {{ request('sort')=='p.price' && request('order')=='ASC' ? 'selected' : '' }}>Price (Low &gt; High)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'p.price','order'=>'DESC']) }}" {{ request('sort')=='p.price' && request('order')=='DESC' ? 'selected' : '' }}>Price (High &gt; Low)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'rating','order'=>'DESC']) }}" {{ request('sort')=='rating' && request('order')=='DESC' ? 'selected' : '' }}>Rating (Highest)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'rating','order'=>'ASC']) }}" {{ request('sort')=='rating' && request('order')=='ASC' ? 'selected' : '' }}>Rating (Lowest)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'p.model','order'=>'ASC']) }}" {{ request('sort')=='p.model' && request('order')=='ASC' ? 'selected' : '' }}>Model (A - Z)</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort'=>'p.model','order'=>'DESC']) }}" {{ request('sort')=='p.model' && request('order')=='DESC' ? 'selected' : '' }}>Model (Z - A)</option>
                            </select>
                        </div>

                        <div class="input-group input-group-sm per-page">
                            <label class="input-group-addon" for="input-limit">Show:</label>
                            <select id="input-limit" class="form-control" onchange="location = this.value;">
                                <option value="{{ request()->fullUrlWithQuery(['limit'=>20]) }}" {{ request('limit')==20 ? 'selected' : '' }}>20</option>
                                <option value="{{ request()->fullUrlWithQuery(['limit'=>25]) }}" {{ request('limit')==25 ? 'selected' : '' }}>25</option>
                                <option value="{{ request()->fullUrlWithQuery(['limit'=>50]) }}" {{ request('limit')==50 ? 'selected' : '' }}>50</option>
                                <option value="{{ request()->fullUrlWithQuery(['limit'=>75]) }}" {{ request('limit')==75 ? 'selected' : '' }}>75</option>
                                <option value="{{ request()->fullUrlWithQuery(['limit'=>100]) }}" {{ request('limit')==100 ? 'selected' : '' }}>100</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row main-products product-grid model-content">
                    @forelse($products->groupBy(function($item) { return $item->brand->name ?? 'Other'; }) as $brandName => $brandProducts)
                        <div class="col-xs-12">
                            <div class="module-products-302">
                                <h3 class="title module-title">
                                    <div class="section-arrow-header">
                                        <span class="section-arrow-text">{{ $brandName }}</span>
                                    </div>
                                </h3>
                            </div>  
                        </div>
                        @foreach($brandProducts as $product)
                                        <div class="col-xs-6 col-sm-6 col-md-3">
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

                                                        <div class="name"><a class="truncate-text" href="{{ url('product/'.$product->slug) }}">{{ $product->name }}</a></div>

                                                        <div>
                                                            @if(!$product->no_sale_price)
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
                                                                                    <svg class="btn-cart-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                                                                    <span class="btn-text">Add to Cart</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="wish-group">
                                                                            <a class="btn btn-wishlist" data-id="{{ $product->id }}" data-toggle="tooltip"
                                                                                data-tooltip-class="product-grid wishlist-tooltip"
                                                                                data-placement="top" title="" onclick="addTowishlist({{ $product->id }})" data-original-title="Add to Wish List">
                                                                                <span class="btn-text">Add to Wish List</span>
                                                                            </a>

                                                                            <a class="btn btn-compare" data-id="{{ $product->id }}" data-toggle="tooltip"
                                                                                data-tooltip-class="product-grid compare-tooltip"
                                                                                data-placement="top" title="" onclick="addCompareList({{ $product->id }})" data-original-title="Compare this Product" >
                                                                                <span class="btn-text">Compare this Product</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="price">
                                                                    <div>
                                                                        <span class="price-normal">Contact for Price</span>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-cart" data-toggle="modal" data-target="#whatsappModal" data-product="{{ $product->name }}" data-url="{{ url('product/'.$product->slug) }}" style="display: inline-flex; align-items: center; justify-content: center; gap: 5px; float: none;">
                                                                        <svg fill="#FFFFFF" width="15px" height="15px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.070-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.010 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.010-0.464-0.012-0.712-0.012-0.395 0.010-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z"></path></svg>
                                                                        Chat on WhatsApp
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                    @empty
                        <div class="col-md-12 text-center">
                            <p class="text-danger text-center">No products found in this category.</p>
                        </div>
                    @endforelse
                </div>
                <div class="row pagination-results">
                    <div class="col-sm-6 text-left">
                        {{ $products->links('vendor.pagination.custom') }}
                    </div>
                    <div class="col-sm-6 text-right">
                        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} ({{ $products->lastPage() }} Pages)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection    

@section('scripts')
<script>
    $(document).ready(function(){

        $("input[name='m']").on('change', function(){
            applyFilters();
        });

        $("input[name='tags']").on('change', function(){
            applyFilters();
        });

        $("input[name='c']").on('change', function(){
            applyFilters();
        });

        function applyFilters(){
            let params = new URLSearchParams(window.location.search);

            // Collect selected brand IDs
            let selectedBrands = $("input[name='m']:checked").map(function(){
                return $(this).val();
            }).get();
            if(selectedBrands.length){
                params.set('m', selectedBrands.join(','));
            } else {
                params.delete('m');
            }

            // Collect selected tags
            let selectedTags = $("input[name='tags']:checked").map(function(){
                return $(this).val();
            }).get();
            if(selectedTags.length){
                params.set('tags', selectedTags.join(','));
            } else {
                params.delete('tags');
            }

            let selectedSubcats = $("input[name='c']:checked").map(function(){
                return $(this).val();
            }).get();

            if(selectedSubcats.length){
                params.set('c', selectedSubcats.join(','));
            } else {
                params.delete('c');
            }

            window.location.search = params.toString();
        }

        const minRange = document.getElementById('minRange');
        const maxRange = document.getElementById('maxRange');
        const minInput = document.getElementById('minInput');
        const maxInput = document.getElementById('maxInput');
        const sliderTrack = document.getElementById('slider-track');

        function updateSliderTrack(min, max){
            let percentMin = (min / minRange.max) * 100;
            let percentMax = (max / maxRange.max) * 100;
            sliderTrack.style.background = `linear-gradient(to right, #ddd ${percentMin}%, orange ${percentMin}%, orange ${percentMax}%, #ddd ${percentMax}%)`;
        }

        function applyPriceFilter(){
            let min = parseInt(minRange.value);
            let max = parseInt(maxRange.value);

            // Prevent overlap
            if(min > max - 1) min = max - 1;
            if(max < min + 1) max = min + 1;

            minRange.value = min;
            maxRange.value = max;
            minInput.value = min;
            maxInput.value = max;

            updateSliderTrack(min, max);

            // Update URL
            let params = new URLSearchParams(window.location.search);
            params.set('min_price', min);
            params.set('max_price', max);
            window.location.search = params.toString();
        }

        // Slider events
        minRange.addEventListener('input', applyPriceFilter);
        maxRange.addEventListener('input', applyPriceFilter);

        // Number input events
        minInput.addEventListener('change', applyPriceFilter);
        maxInput.addEventListener('change', applyPriceFilter);

        // Initialize slider track
        updateSliderTrack(parseInt(minRange.value), parseInt(maxRange.value));

    });
</script>
@endsection   