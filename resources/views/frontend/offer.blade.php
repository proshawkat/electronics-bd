@extends('layouts.frontend')
@section('styles')
    <style>
        .discount_badge{
            position: absolute;
            top: 10px;
            right: 10px;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        .discount_badge svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .discount_badge .discount_text {
            position: relative;
            color: #fff;
            font-size: 13px;
        }
    </style>
@endsection
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
                                                <div class="module-item module-item-p panel panel-active">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <a href="#filter-68a7fbe21c954-collapse-1" class="accordion-toggle" data-toggle="collapse" aria-expanded="true" data-filter="p">
                                                                Price
                                                                <i class="fa fa-caret-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="panel-collapse collapse in" id="filter-68a7fbe21c954-collapse-1">
                                                        <div class="panel-body">
                                                            @php
                                                                $minPrice = request()->get('min_price', 0);
                                                                $maxPrice = request()->get('max_price', 25000);
                                                            @endphp
                                                            <div class="filter-price" id="filter-filter-68a7fbe21c954-1">
                                                                <div class="range-slider">
                                                                    <div class="slider-track" id="slider-track"></div>
                                                                    <input type="range" id="minRange" min="0" max="50000" value="{{ $minPrice }}" step="1">
                                                                    <input type="range" id="maxRange" min="0" max="50000" value="{{ $maxPrice }}" step="1">
                                                                </div>
                                                                <div class="inputs">
                                                                    <div class="input-wrapper">
                                                                        <span>৳</span>
                                                                        <input type="number" id="minInput" value="{{ $minPrice }}">
                                                                    </div>
                                                                    <div class="input-wrapper">
                                                                        <span>৳</span>
                                                                        <input type="number" id="maxInput" value="{{ $maxPrice }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="module-item module-item-m text-only panel panel-collapsed">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <a href="#filter-68a7fbe21c954-collapse-3" class="accordion-toggle collapsed" data-toggle="collapse" aria-expanded="false" data-filter="m">
                                                                Brands
                                                                <i class="fa fa-caret-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="filter-68a7fbe21c954-collapse-3" aria-expanded="false" style="height: 0px;">
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
                                                <div class="module-item module-item-t panel panel-active">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">
                                                            <a href="#filter-68a7fbe21c954-collapse-4" class="accordion-toggle" data-toggle="collapse" aria-expanded="true" data-filter="t">
                                                                Tags
                                                                <i class="fa fa-caret-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="panel-collapse collapse in" id="filter-68a7fbe21c954-collapse-4" aria-expanded="true" style="">
                                                        <div class="panel-body">
                                                            <div class="filter-checkbox">
                                                                @foreach($tags as $tag)
                                                                    <label>
                                                                        <input type="checkbox" data-filter-trigger="" name="tags" value="{{ $tag->id }}" {{ in_array($tag->id, explode(',', request('tags'))) ? 'checked' : '' }} />
                                                                        <span class="links-text">{{ $tag->name }}</span>
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
                        <h3>Components</h3>
                        <h3></h3>
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
                    @forelse($products as $product)
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <div class="product-layout has-extra-button">
                                <div class="product-thumb">
                                    <div class="image">
                                        <div class="quickview-button">
                                            <a class="btn btn-quickview" data-toggle="tooltip" data-tooltip-class="product-grid quickview-tooltip" data-placement="top" title="" data-original-title="Quickview">
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
                                        @if($product->offer && $product->offer->status == 1)
                                            @php
                                                $offer = $product->offer;
                                                $offerPrice = $product->getPriceForQuantity($offer->min_qty);

                                                $badgeText = $offer->discount_type == 'percent' ? intval($offer->discount_value) . '%' : intval($offer->discount_value) . '৳';
                                            @endphp

                                            <div class="discount_badge offer-badge">
                                                <svg width="40px" height="40px" viewBox="0 0 16 16" fill="none">
                                                    <path d="M16 8C16 6.8804 15.4743 5.88358 14.6563 5.24291C14.7817 4.21146 14.4486 3.13488 13.6569 2.3432C12.8652 1.55152 11.7886 1.21838 10.7572 1.3438C10.1165 0.525732 9.11964 0 8 0C6.8804 0 5.88358 0.525698 5.24291 1.34372C4.21145 1.2183 3.13485 1.55143 2.34316 2.34312C1.55147 3.13481 1.21834 4.21141 1.34376 5.24288C0.525715 5.88354 0 6.88038 0 8C0 9.1196 0.525698 10.1164 1.34372 10.7571C1.2183 11.7886 1.55143 12.8652 2.34312 13.6568C3.13481 14.4485 4.21141 14.7817 5.24288 14.6562C5.88354 15.4743 6.88038 16 8 16C9.1196 16 10.1164 15.4743 10.7571 14.6563C11.7886 14.7817 12.8652 14.4486 13.6568 13.6569C14.4485 12.8652 14.7817 11.7886 14.6562 10.7572C15.4743 10.1165 16 9.11964 16 8Z" 
                                                    fill="#D9534F"></path>
                                                </svg>
                                                <span style="
                                                    position:absolute;
                                                    top:50%;
                                                    left:50%;
                                                    transform:translate(-50%, -50%);
                                                    color:#fff;
                                                    font-size:12px;
                                                    font-weight:bold;
                                                ">
                                                    {{ $badgeText }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="caption">
                                        <div class="stats">
                                            <span class="stat-1"><span class="stats-label">Stock:</span> <span>{{ $product->stock_status }}</span></span>
                                            <span class="stat-2"><span class="stats-label">Model:</span> <span>{{ $product->model }}</span></span>
                                        </div>

                                        <div class="name"><a href="{{ url('product/'.$product->slug) }}">{{ $product->name }}</a></div>

                                        <div>
                                            @if($product->offer && $product->offer->status == 1)
                                                @php
                                                    $offer = $product->offer;
                                                    $offerPrice = $product->getPriceForQuantity($offer->min_qty);
                                                @endphp

                                                <p class="price">
                                                    <span class="price-new">{{ number_format($offerPrice, 2) }} ৳</span>
                                                    <span class="price-old">{{ number_format($product->sale_price, 2) }} ৳</span>
                                                </p>

                                                <p class="text-center">
                                                    <small class="text-info">
                                                        * Minimum Quantity: {{ $offer->min_qty }}
                                                    </small>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-normal">{{ number_format($product->sale_price, 2) }} ৳</span>
                                                </p>
                                            @endif

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
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
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