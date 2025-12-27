<div class="modal fade" id="quickViewModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <div class="modal-body" id="modalContent">
        <div class="row">
          <div class="col-sm-5">
            <div class="text-center modal-img-wrap">
              <!-- image append -->
            </div>
          </div>
          <div class="col-sm-7 modal-body-content">
            <div class="product-info">
              <div id="product" class="product-details">
                <div class="title page-title">
                  <!-- content -->
                </div> 
                <div class="product-stats">
                  <ul class="list-unstyled">
                    <li class="stats-itams" id="modal-price-span-li"><b>Price:</b> <span id="mp_price"></span></li>
                    <li class="product-stock stats-itams in-stock"><b>Stock:</b> <span id="mp_stock_status">In Stock</span></li>
                    <!-- <li class="product-code stats-itams"><b>Product Code:</b> <span id="mp_product_code"> </span></li> -->
                    <li class="product-model stats-itams"><b>Model:</b> <span id="mp_product_mode"></span></li>
                  </ul> 
                </div>
                <div class="product-price-group" id="modal-product-price-group">
                  <div class="price-wrapper">
                    <div class="price-group">
                      <div class="product-price"></div>
                    </div>
                  </div>
                </div>
                <div class="button-group-page" id="modal-button-group-page">
                  <div class="buttons-wrapper">
                    <div class="stepper-group cart-group">
                      <div class="stepper">
                        <label class="control-label" for="product-quantity">Qty</label>
                        <input id="product-quantity" type="number" name="quantity" value="1" data-minimum="1" class="form-control" />
                        <span>
                          <i class="fa fa-angle-up"></i>
                          <i class="fa fa-angle-down"></i>
                        </span>
                      </div>
                      <a id="button-cart" onclick="addToCart()" class="btn btn-cart"><span class="btn-text">Add to Cart</span></a>

                      <div class="extra-group">
                        <a class="btn btn-extra btn-extra-46 btn-1-extra" data-quick-buy="" onclick="buyNowClicked()" data-loading-text="&lt;span class='btn-text'&gt;Buy Now&lt;/span&gt;"><span class="btn-text">Buy Now</span></a>
                      </div>
                    </div>

                    <div class="wishlist-compare">
                      <a class="btn btn-wishlist" data-toggle="tooltip" data-tooltip-class="pp-wishlist-tooltip" data-placement="top" title="" onclick="addTowishlist();" data-original-title="Add to Wish List">
                        <span class="btn-text">Add to Wish List</span>
                      </a>

                      <a class="btn btn-compare" data-toggle="tooltip" data-tooltip-class="pp-compare-tooltip" data-placement="top" title="" onclick="addCompareList();" data-original-title="Compare this Product">
                        <span class="btn-text">Compare this Product</span>
                      </a>
                    </div>
                  </div>
                </div>
                @php
                    $adminNumber = $generalSettings->admin_whatsapp_number ?? '8801XXXXXXXXX';
                    $cleanNumber = preg_replace('/\D/', '', $adminNumber);
                    $whatsappLink = "https://wa.me/{$cleanNumber}";
                @endphp
                <div class="contact-whatsapp-box text-center mt-4" id="modal-contact-whatsapp-box">
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
          </div>
        </div>   
      </div>
      
    </div>
  </div>
</div>