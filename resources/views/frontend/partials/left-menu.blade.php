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
                                                <a href="{{ url('category/'.$category->slug) }}" class="dropdown-toggle" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 640 640"><path d="M320.1 32C329.1 32 337.4 37.1 341.5 45.1L415 189.3L574.9 214.7C583.8 216.1 591.2 222.4 594 231C596.8 239.6 594.5 249 588.2 255.4L473.7 369.9L499 529.8C500.4 538.7 496.7 547.7 489.4 553C482.1 558.3 472.4 559.1 464.4 555L320.1 481.6L175.8 555C167.8 559.1 158.1 558.3 150.8 553C143.5 547.7 139.8 538.8 141.2 529.8L166.4 369.9L52 255.4C45.6 249 43.4 239.6 46.2 231C49 222.4 56.3 216.1 65.3 214.7L225.2 189.3L298.8 45.1C302.9 37.1 311.2 32 320.2 32zM320.1 108.8L262.3 222C258.8 228.8 252.3 233.6 244.7 234.8L119.2 254.8L209 344.7C214.4 350.1 216.9 357.8 215.7 365.4L195.9 490.9L309.2 433.3C316 429.8 324.1 429.8 331 433.3L444.3 490.9L424.5 365.4C423.3 357.8 425.8 350.1 431.2 344.7L521 254.8L395.5 234.8C387.9 233.6 381.4 228.8 377.9 222L320.1 108.8z"/></svg>
                                                    
                                                    <span class="links-text">{{ $category->name }}</span>
                                                    <span class="open-menu collapsed" data-toggle="collapse" data-target="#collapse-{{ $category->id }}">
                                                        <i class="fa fa-plus"></i>
                                                    </span>
                                                </a>

                                                <div class="dropdown-menu j-dropdown" id="collapse-{{ $category->id }}">
                                                    <ul class="j-menu">
                                                        @foreach($category->children as $sub)
                                                            <li class="menu-item menu-item-c{{ $sub->id }}">
                                                                <a href="{{ url('category/'.$sub->slug) }}">
                                                                    <span class="links-text">{{ $sub->name }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @else
                                            <li class="menu-item flyout-menu-item flyout-menu-item-{{ $loop->iteration }} multi-level">
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
                        <div class="grid-item grid-item-column-left-1-1-2">
                            <div class="module module-button module-button-309">
                                <a class="btn">Service</a>
                            </div>
                        </div>
                        <div class="grid-item grid-item-column-left-1-1-3">
                            <div class="module module-info_blocks module-info_blocks-283">
                                <div class="module-body">
                                    <div class="module-item module-item-1 info-blocks info-blocks-icon">
                                        <div class="info-block">
                                            <div class="info-block-content">
                                                <div class="info-block-content-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="35px" height="35px"><path d="M64 160C64 124.7 92.7 96 128 96L416 96C451.3 96 480 124.7 480 160L480 192L530.7 192C547.7 192 564 198.7 576 210.7L621.3 256C633.3 268 640 284.3 640 301.3L640 448C640 483.3 611.3 512 576 512L572.7 512C562.3 548.9 528.3 576 488 576C447.7 576 413.8 548.9 403.3 512L300.7 512C290.3 548.9 256.3 576 216 576C175.7 576 141.8 548.9 131.3 512L128 512C92.7 512 64 483.3 64 448L64 400L24 400C10.7 400 0 389.3 0 376C0 362.7 10.7 352 24 352L136 352C149.3 352 160 341.3 160 328C160 314.7 149.3 304 136 304L24 304C10.7 304 0 293.3 0 280C0 266.7 10.7 256 24 256L200 256C213.3 256 224 245.3 224 232C224 218.7 213.3 208 200 208L24 208C10.7 208 0 197.3 0 184C0 170.7 10.7 160 24 160L64 160zM576 352L576 301.3L530.7 256L480 256L480 352L576 352zM256 488C256 465.9 238.1 448 216 448C193.9 448 176 465.9 176 488C176 510.1 193.9 528 216 528C238.1 528 256 510.1 256 488zM488 528C510.1 528 528 510.1 528 488C528 465.9 510.1 448 488 448C465.9 448 448 465.9 448 488C448 510.1 465.9 528 488 528z"/></svg>
                                                </div>
                                                <div>
                                                    <div class="info-block-title">Free Shipping</div>
                                                    <div class="info-block-text">Free delivery For Maono Product</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="module-item module-item-2 info-blocks info-blocks-icon">
                                        <div class="info-block">
                                            <div class="info-block-content">
                                                <div class="info-block-content-icon">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                            width="35px" height="35px" viewBox="0 0 352.326 352.327"
                                                            xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path d="M204.994,193.713c-4.475,0-8.194,1.516-10.757,4.385c-2.3,2.571-3.564,6.068-3.564,9.847
                                                                    c0,6.939,4.532,14.41,14.482,14.41c4.474,0,8.194-1.516,10.757-4.386c2.298-2.571,3.562-6.067,3.562-9.846
                                                                    C219.475,201.183,214.943,193.713,204.994,193.713z"/>
                                                                <path d="M147.903,158.913c4.487,0,8.217-1.513,10.787-4.373c2.3-2.562,3.567-6.045,3.567-9.808
                                                                    c0-6.918-4.542-14.363-14.517-14.363c-10.17,0-14.722,7.124-14.722,14.183C133.018,151.469,137.676,158.913,147.903,158.913z"/>
                                                                <path d="M176.164,62.745c-62.539,0-113.418,50.879-113.418,113.418c0,62.539,50.879,113.418,113.418,113.418
                                                                    s113.418-50.879,113.418-113.418C289.582,113.624,238.703,62.745,176.164,62.745z M127.072,126.31
                                                                    c5.051-5.505,12.198-8.415,20.668-8.415c18.203,0,27.728,13.497,27.728,26.828c0,7.001-2.477,13.542-6.973,18.419
                                                                    c-5.073,5.501-12.25,8.41-20.755,8.41c-18.122,0-27.604-13.497-27.604-26.829C120.136,137.725,122.599,131.186,127.072,126.31z
                                                                    M144.096,222.29c-1.101,1.229-3.351,2.234-5.001,2.234h-11.697c-1.65,0-2.097-1.004-0.994-2.229l82.535-91.765
                                                                    c1.104-1.227,3.355-2.255,5.006-2.285l11.584-0.212c1.649-0.03,2.099,0.951,0.998,2.18L144.096,222.29z M225.354,226.182
                                                                    c-4.977,5.396-12.018,8.25-20.359,8.25c-17.778,0-27.08-13.239-27.08-26.316c0-6.865,2.417-13.28,6.805-18.063
                                                                    c4.955-5.399,11.965-8.255,20.274-8.255c17.856,0,27.198,13.24,27.198,26.317C232.192,214.981,229.764,221.397,225.354,226.182z"
                                                                    />
                                                                <path d="M322.759,223.797c5.22-16.073,29.567-29.82,29.567-47.634c0-17.814-24.348-31.562-29.567-47.635
                                                                    c-5.409-16.659,6.021-42.056-4.07-55.922c-10.192-14.005-37.947-10.933-51.952-21.125C252.87,41.389,247.272,13.989,230.612,8.58
                                                                    c-16.073-5.219-36.636,13.487-54.449,13.487c-17.814,0-38.376-18.707-54.45-13.487c-16.659,5.409-22.256,32.81-36.123,42.901
                                                                    c-14.005,10.192-41.759,7.12-51.952,21.125c-10.091,13.867,1.338,39.264-4.071,55.923C24.348,144.602,0,158.35,0,176.164
                                                                    c0,17.812,24.348,31.561,29.567,47.635c5.409,16.659-6.021,42.056,4.071,55.922c10.192,14.005,37.947,10.934,51.952,21.125
                                                                    c13.866,10.092,19.464,37.492,36.124,42.901c16.073,5.219,36.635-13.488,54.449-13.488c17.813,0,38.376,18.707,54.45,13.487
                                                                    c16.659-5.409,22.256-32.811,36.123-42.901c14.005-10.191,41.759-7.12,51.952-21.125
                                                                    C328.78,265.853,317.35,240.457,322.759,223.797z M176.164,306.582c-71.913,0-130.418-58.505-130.418-130.418
                                                                    c0-71.914,58.505-130.418,130.418-130.418s130.418,58.505,130.418,130.418C306.582,248.077,248.077,306.582,176.164,306.582z"/>
                                                            </g>
                                                        </g>
                                                        </svg>
                                                </div>    
                                                <div>
                                                    <div class="info-block-title">10% Discount</div>
                                                    <div class="info-block-text">For first Order</div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="module-item module-item-3 info-blocks info-blocks-icon">
                                        <div class="info-block">
                                            <div class="info-block-content">
                                                <div class="info-block-content-icon">
                                                    <svg width="35px" height="35px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M26.887 16.699c1.152 8.047-5.704 8.654-6.696 9.115-2.233 0.779-4.026 2.248-4.026 2.248s-1.459-1.275-3.646-2.248c-1.033-0.426-8.568-1.094-7.414-9.115 0.243-1.155 1.578-2.127 1.578-4.072s-1.64-4.193-1.64-4.193l4.68-4.497c0 0 1.641 1.157 3.1 1.157s3.342-1.157 3.342-1.157 1.884 1.157 3.281 1.157c1.398 0 3.1-1.157 3.1-1.157l4.367 4.437c0 0-1.64 2.313-1.64 4.254s1.321 2.857 1.614 4.071zM16.099 7.936c-4.105 0-7.433 3.637-7.433 7.742s3.327 7.123 7.433 7.123c4.104 0 7.433-3.018 7.433-7.123-0.001-4.105-3.329-7.742-7.433-7.742zM16.14 22.367c-3.831 0-6.938-3.105-6.938-6.937 0-3.831 3.106-6.937 6.938-6.937s6.937 3.105 6.937 6.937c-0.001 3.832-3.106 6.937-6.937 6.937zM20.323 12.299c-0.396 0-0.715 0.318-0.722 0.712h-1.985l-1.042-1.805c0.199-0.129 0.339-0.343 0.339-0.598 0-0.4-0.324-0.725-0.725-0.725s-0.725 0.324-0.725 0.725c0 0.273 0.158 0.504 0.383 0.627l-1.025 1.775h-2.046c-0.007-0.394-0.326-0.712-0.722-0.712-0.4 0-0.725 0.324-0.725 0.724s0.324 0.725 0.725 0.725c0.129 0 0.244-0.043 0.349-0.102l1.026 1.777-1.039 1.799c-0.102-0.055-0.213-0.094-0.336-0.094-0.4 0-0.725 0.324-0.725 0.725 0 0.398 0.324 0.723 0.725 0.723 0.399 0 0.724-0.324 0.724-0.723 0-0.008-0.003-0.012-0.003-0.020h2.047l1.037 1.799c-0.231 0.119-0.395 0.355-0.395 0.635 0 0.4 0.324 0.725 0.725 0.725s0.725-0.324 0.725-0.725c0-0.262-0.146-0.479-0.352-0.605l1.055-1.828h1.956c0 0.008-0.004 0.012-0.004 0.020 0 0.398 0.325 0.723 0.725 0.723s0.725-0.324 0.725-0.723c0-0.4-0.324-0.725-0.725-0.725-0.095 0-0.186 0.020-0.269 0.053l-1.016-1.758 1.009-1.748c0.094 0.044 0.195 0.072 0.306 0.072 0.4 0 0.725-0.324 0.725-0.725 0-0.398-0.324-0.723-0.725-0.723z"></path>
                                                    </svg>
                                                </div>    
                                                <div>
                                                    <div class="info-block-title">Studio Equipment</div>
                                                    <div class="info-block-text">Use code "COMBO"</div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="module-item module-item-4 info-blocks info-blocks-icon">
                                        <div class="info-block">
                                            <div class="info-block-content">
                                                <div class="info-block-content-icon info-block-content-icon-box">
                                                    <svg width="35px" height="35px" viewBox="0 0 24 24" fill="#FFF" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.5777 3.38197L17.5777 4.43152C19.7294 5.56066 20.8052 6.12523 21.4026 7.13974C22 8.15425 22 9.41667 22 11.9415V12.0585C22 14.5833 22 15.8458 21.4026 16.8603C20.8052 17.8748 19.7294 18.4393 17.5777 19.5685L15.5777 20.618C13.8221 21.5393 12.9443 22 12 22C11.0557 22 10.1779 21.5393 8.42229 20.618L6.42229 19.5685C4.27063 18.4393 3.19479 17.8748 2.5974 16.8603C2 15.8458 2 14.5833 2 12.0585V11.9415C2 9.41667 2 8.15425 2.5974 7.13974C3.19479 6.12523 4.27063 5.56066 6.42229 4.43152L8.42229 3.38197C10.1779 2.46066 11.0557 2 12 2C12.9443 2 13.8221 2.46066 15.5777 3.38197Z" stroke="#EB6626" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path d="M21 7.5L12 12M12 12L3 7.5M12 12V21.5" stroke="#EB6626" stroke-width="1.5" stroke-linecap="round"/>
                                                    </svg>
                                                </div>    
                                                <div>
                                                    <div class="info-block-title">Flat 5% Discount</div>
                                                    <div class="info-block-text">For any mono Product</div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item grid-item-column-left-1-1-4">
                            <div class="module module-button module-button-310">
                                <a class="btn">See All Latest Products</a>
                            </div>
                        </div>
                        <div class="grid-item grid-item-column-left-1-1-5">
                            <div class="module module-side_products module-side_products-151">
                                <div class="module-body side-products-blocks">
                                    <div class="module-item module-item-1">
                                        <h3 class="title module-title">Related Product</h3>
                                        <div class="side-products">
                                            <div class="product-layout">
                                                <div class="side-product">
                                                    <div class="image">
                                                        <a href="#" class="product-img">
                                                            <img
                                                                src="https://www.citytechbd.com/image/cache/catalog/zfx-p1007-speed-controller-regulator-switch-single-phase-reduction-motor-fan-220v-500w-in-bd-60x60w.png"
                                                                srcset=" https://www.citytechbd.com/image/cache/catalog/zfx-p1007-speed-controller-regulator-switch-single-phase-reduction-motor-fan-220v-500w-in-bd-60x60w.png   1x, https://www.citytechbd.com/image/cache/catalog/zfx-p1007-speed-controller-regulator-switch-single-phase-reduction-motor-fan-220v-500w-in-bd-120x120w.png 2x" width="60" height="60" alt=""
                                                                title=""
                                                                class="img-first"
                                                            />
                                                        </a>

                                                        <div class="quickview-button">
                                                            <a class="btn btn-quickview" title="Quickview" data-original-title="Quickview" data-placement="top" data-toggle="modal"  data-target="#quickViewModal-2200">
                                                                <span class="btn-text">Quickview</span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="caption">
                                                        <div class="name">
                                                            <a href="#">
                                                                ZFX-P1007 Speed Controller Regulator Switch single-phase reduction motor fan 220V 500W
                                                            </a>
                                                        </div>

                                                        <div class="price">
                                                            <span class="price-normal">1,449৳</span>
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
</aside>