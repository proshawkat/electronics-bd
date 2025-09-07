@extends('layouts.frontend')

@section('content')

<h1 class="title page-title"><span>Quick Checkout</span></h1>

<div class="container">
    <div class="row">
        <div id="content">
            <div class="quick-checkout-wrapper">
                <div class="">
                    <div class="left">
                        <form>
                            <div class="checkout-section section-login">
                                <div class="title section-title">Login or Register</div>
                                <div class="section-body">
                                    <div class="form-group login-options">
                                        <div class="radio">
                                            <label><input type="radio" name="account" value="" />Login</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="account" value="register" />Register</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="account" value="guest" />Guest</label>
                                        </div>
                                    </div>
                                    <div class="login-form">
                                        <!---->
                                        <!---->
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-section section-register">
                                <div class="title section-title">Your Personal Details</div>
                                <div class="section-body">
                                    <div class="form-group account-customer-group" style="display: none;">
                                        <label class="control-label">Customer Group</label>
                                        <div class="radio">
                                            <label><input type="radio" name="customer_group_id" value="1" checked="checked" /> Default</label>
                                        </div>
                                    </div>
                                    <div class="form-group required account-firstname">
                                        <label for="input-firstname" class="control-label">First Name</label> <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
                                        <!---->
                                    </div>
                                    <div class="form-group required account-lastname">
                                        <label for="input-lastname" class="control-label">Last Name</label> <input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
                                        <!---->
                                    </div>
                                    <div class="form-group required account-email">
                                        <label for="input-email" class="control-label">E-Mail</label> <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control" />
                                        <!---->
                                    </div>
                                    <div class="form-group required account-telephone">
                                        <label for="input-telephone" class="control-label">Telephone</label> <input type="text" name="telephone" value="" placeholder="Telephone" id="input-telephone" class="form-control" />
                                        <!---->
                                    </div>
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                            <div class="checkout-section payment-address">
                                <div class="title section-title">Billing Address</div>
                                <div class="section-body">
                                    <!---->
                                    <!---->
                                    <!---->
                                    <div>
                                        <!---->
                                        <!---->
                                        <div class="form-group required address-company">
                                            <label for="input-payment-company" class="control-label">Company</label> <input type="text" name="company" value="" placeholder="Company" id="input-payment-company" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required address-address-1">
                                            <label for="input-payment-address-1" class="control-label">Address 1</label>
                                            <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required address-address-2">
                                            <label for="input-payment-address-2" class="control-label">Address 2</label>
                                            <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required address-city">
                                            <label for="input-payment-city" class="control-label">City</label> <input type="text" name="city" value="" placeholder="City" id="input-payment-city" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required address-zone">
                                            <label for="input-payment-zone" class="control-label">Region / State</label>
                                            <select name="zone_id" id="input-payment-zone" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                <!---->
                                                <option value="320">Barisal</option>
                                                <option value="321">Chittagong</option>
                                                <option value="322">Dhaka</option>
                                                <option value="323">Khulna</option>
                                                <option value="4240">Mymensingh</option>
                                                <option value="324">Rajshahi</option>
                                                <option value="4239">Rangpur</option>
                                                <option value="325">Sylhet</option>
                                            </select>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="checkbox checkout-same-address">
                                        <label><input type="checkbox" /> My delivery and billing addresses are the same.</label>
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </form>
                    </div>
                    <div class="right">
                        @if(count($cartItems) > 0)
                            <div class="checkout-section shipping-payment">
                                <div class="section-shipping">
                                    <div class="title section-title">Shipping Method</div>
                                    <div class="section-body">
                                        <!---->
                                        <div>
                                            <div class="shippings">
                                                <div class="ship-wrapper">
                                                    <p>Pickup</p>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="shipping_method" value="pickup.pickup" /> <span class="shipping-quote-title">Pickup From Store - 0৳</span>
                                                            <!---->
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-payment">
                                    <div class="title section-title">Payment Method</div>
                                    <div class="section-body">
                                        <!---->
                                        <div>
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" value="cod" /> <span>Cash On Delivery</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-section section-cvr">
                                <div class="title section-title">Coupon / Voucher / Reward</div>
                                <div class="section-body">
                                    <div class="form-group form-coupon">
                                        <label for="input-coupon" class="control-label">Enter your coupon here</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter your coupon here" id="input-coupon" class="form-control" />
                                            <span class="input-group-btn">
                                                <button type="button" data-loading-text="Loading..." class="btn btn-primary"><span>Submit</span></button>
                                            </span>
                                        </div>
                                        <!---->
                                        <!---->
                                    </div>
                                    <div class="form-group form-voucher">
                                        <label for="input-voucher" class="control-label">Enter your gift certificate code here</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control" />
                                            <span class="input-group-btn">
                                                <button type="button" data-loading-text="Loading..." class="btn btn-primary"><span>Submit</span></button>
                                            </span>
                                        </div>
                                        <!---->
                                        <!---->
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <div class="checkout-section cart-section">
                                <div class="title section-title">Shopping Cart</div>
                                <div class="section-body">
                                    <!---->
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td class="text-center td-image">Image</td>
                                                    <td class="text-left td-product">Product Name</td>
                                                    <td class="text-center td-model">Model</td>
                                                    <td class="text-center td-qty">Quantity</td>
                                                    <td class="text-right td-price">Unit Price</td>
                                                    <td class="text-right td-total">Total</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cartItems as $item)
                                                    <tr>
                                                        <td class="text-center td-image">
                                                            <a href="{{ $item['url'] }}">
                                                                <img src="{{ $item['image'] }}" srcset="{{ $item['image'] }}"
                                                                    alt="{{ $item['name'] }}" title="{{ $item['name'] }}" class="img-thumbnail" width="60"/>
                                                            </a>
                                                        </td>
                                                        <td class="text-left td-product">
                                                            <a href="{{ $item['url'] }}">
                                                                {{ $item['name'] }}
                                                            </a>
                                                        </td>
                                                        <td class="text-left td-model">{{ $item['model'] }}</td>
                                                        <td class="text-left td-qty">
                                                            <div class="input-group btn-block" style="max-width: 200px;">
                                                                <div class="stepper">
                                                                    <input type="text" class="form-control" value="{{ $item['qty'] }}"/> <span><i class="fa fa-angle-up"></i> <i class="fa fa-angle-down"></i></span>
                                                                </div>
                                                                <span class="input-group-btn">
                                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="text-right td-price">{{ $item['price'] }}৳</td>
                                                        <td class="text-right td-total">{{ $item['subtotal'] }}৳</td>
                                                    </tr>
                                                @endforeach    
                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="table table-bordered">
                                        <tfoot>
                                            <tr>
                                                <td colspan="7" class="text-right"><strong>Sub-Total:</strong></td>
                                                <td class="text-right">{{ $totalPrice }}৳</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" class="text-right"><strong>Pickup From Store:</strong></td>
                                                <td class="text-right">0৳</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" class="text-right"><strong>Total:</strong></td>
                                                <td class="text-right">{{ $totalPrice }}৳</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="checkout-section checkout-payment-details payment-cod">
                                <div class="title section-title">Payment Details</div>
                                <div class="quick-checkout-payment">
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input type="button" value="Confirm Order" id="button-confirm" data-loading-text="Loading..." class="btn btn-primary" />
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        <!--
                                        $('#button-confirm').on('click', function() {
                                            $.ajax({
                                                url: 'index.php?route=extension/payment/cod/confirm',
                                                dataType: 'json',
                                                beforeSend: function() {
                                                    $('#button-confirm').button('loading');
                                                },
                                                complete: function() {
                                                    $('#button-confirm').button('reset');
                                                },
                                                success: function(json) {
                                                    if (json['redirect']) {
                                                        location = json['redirect'];
                                                    }
                                                },
                                                error: function(xhr, ajaxOptions, thrownError) {
                                                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                                }
                                            });
                                        });
                                        //-->
                                    </script>
                                </div>
                            </div>
                            <div class="checkout-section confirm-section">
                                <div class="title section-title">Confirm Your Order</div>
                                <div class="section-body">
                                    <div class="section-comments"><textarea placeholder="Add Comments About Your Order" class="form-control"></textarea></div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" />I wish to subscribe to the CityTech BD newsletter.</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" />I have read and agree to the <a href="https://www.citytechbd.com/index.php?route=information/information/agree&amp;information_id=3" class="agree"><b>Privacy Policy</b></a>
                                        </label>
                                        <!---->
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" />I have read and agree to the
                                            <a href="https://www.citytechbd.com/index.php?route=information/information/agree&amp;information_id=5" class="agree"><b>Terms &amp; Conditions</b></a>
                                        </label>
                                        <!---->
                                    </div>
                                    <div class="buttons confirm-buttons">
                                        <div class="pull-right">
                                            <button type="button" data-loading-text="&lt;span&gt;Confirm Order&lt;/span&gt;" id="quick-checkout-button-confirm" class="btn btn-primary"><span>Confirm Order</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Your cart is empty.</p>
                        @endif                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection