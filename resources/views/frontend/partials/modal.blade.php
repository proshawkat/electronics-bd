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
                    <li class="stats-itams"><b>Price:</b> <span id="mp_price"></span></li>
                    <li class="product-stock stats-itams in-stock"><b>Stock:</b> <span id="mp_stock_status">In Stock</span></li>
                    <li class="product-code stats-itams"><b>Product Code:</b> <span id="mp_product_code"> </span></li>
                    <li class="product-model stats-itams"><b>Model:</b> <span id="mp_product_mode"></span></li>
                  </ul> 
                </div>
                <div class="product-price-group">
                  <div class="price-wrapper">
                    <div class="price-group">
                      <div class="product-price"></div>
                    </div>
                  </div>
                </div>
                <div class="button-group-page">
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
              </div>
          </div>
        </div>   
      </div>
      
    </div>
  </div>
</div>