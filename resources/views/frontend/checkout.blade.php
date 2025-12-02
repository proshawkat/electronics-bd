@extends('layouts.frontend')

@section('content')

<h1 class="title page-title"><span>Quick Checkout</span></h1>

<div class="container">
    <div class="row">
        <div id="content">
            <form method="post" action="{{ route('placeorder') }}">
                @csrf
                <div class="quick-checkout-wrapper">
                    <div class="" id="if_login_user">
                        <div class="left">
                            @if(Auth::guard('customer')->check())
                                <div class="checkout-section payment-address">
                                    <div class="title section-title">Billing Address</div>
                                    <div class="section-body">

                                        @if($customerAddresses->count() > 0)
                                            <div class="radio">
                                                <label><input type="radio" name="address_option" value="existing" checked /> I want to use an existing address</label>
                                            </div>
                                            <div id="payment-existing">
                                                <select name="billing_address_id" id="input-payment-address" class="form-control">
                                                    @foreach($customerAddresses as $address)
                                                        <option value="{{ $address->id }}">
                                                            {{ $address->first_name }} {{ $address->last_name }}, {{ $address->address_1 }}, {{ $address->city }}, {{ $address->region?->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <div class="radio">
                                            <label><input type="radio" name="address_option" value="new" /> I want to use a new address</label>
                                        </div>

                                        <div class="checkout-section new-payment-address hide">
                                            <div class="section-body">
                                                <div>
                                                    <div class="form-group required account-firstname">
                                                        <label for="input-firstname" class="control-label">Name</label> <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="First Name" id="input-firstname" class="form-control" />
                                                        <!---->
                                                    </div>
                                                    <div class="form-group required account-email">
                                                        <label for="input-email" class="control-label">E-Mail</label> <input type="text" name="email" value="{{ old('email') }}" placeholder="E-Mail" id="input-email" class="form-control" />
                                                        <!---->
                                                    </div>
                                                    <div class="form-group required account-telephone">
                                                        <label for="input-telephone" class="control-label">Telephone</label> <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="Telephone" id="input-telephone" class="form-control" />
                                                        <!---->
                                                    </div>
                                                    <div class="form-group required address-address-1">
                                                        <label for="input-payment-address-1" class="control-label">Address 1</label>
                                                        <input type="text" name="address_1" value="{{ old('address_1') }}" placeholder="Address 1" id="input-payment-address-1" class="form-control" />
                                                        <!---->
                                                    </div>
                                                    <div class="form-group required address-address-2">
                                                        <label for="input-payment-address-2" class="control-label">Address 2</label>
                                                        <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control" />
                                                        <!---->
                                                    </div>
                                                    <div class="form-group required address-city">
                                                        <label for="input-payment-city" class="control-label">City</label> <input type="text" name="city" value="{{ old('city') }}" placeholder="City" id="input-payment-city" class="form-control" />
                                                        <!---->
                                                    </div>
                                                    <div class="form-group required address-zone">
                                                        <label for="input-payment-zone" class="control-label">Region / State</label>
                                                        <select name="zone_id" id="input-payment-zone" class="form-control">
                                                            <option value=""> --- Please Select --- </option>
                                                            @foreach($regions as $region)
                                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                            @endforeach    
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 

                                    </div>
                                </div>
                            @else    
                                <div class="checkout-section section-login">
                                    <div class="title section-title">Login or Register</div>
                                    <div class="section-body">
                                        <div class="form-group login-options">
                                            <div class="radio">
                                                <label><input type="radio" name="account" value="login" />Login</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="account" value="register" />Register</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="account" value="guest" checked/>Guest</label>
                                            </div>
                                        </div>
                                        <div class="login-form hide">
                                            <div class="form-group">
                                                <label for="input-login-email" class="control-label">E-Mail</label> 
                                                <input type="text" placeholder="E-Mail" name="login_email" id="input-login-email" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="input-login-password" class="control-label">Password</label> 
                                                <input type="password" placeholder="Password" name="login_password" id="input-login-password" class="form-control" />
                                                <div><a href="#">Forgotten Password</a></div>
                                            </div>
                                            <div class="buttons">
                                                <div class="pull-right">
                                                    <button type="submit" id="button-login" class="btn btn-primary"><span>Login</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-section section-register">
                                    <div class="title section-title">Your Personal Details</div>
                                    <div class="section-body">
                                        <div class="form-group required account-firstname">
                                            <label for="input-firstname" class="control-label">First Name</label> <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="First Name" id="input-firstname" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required account-lastname">
                                            <label for="input-lastname" class="control-label">Last Name</label> <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name" id="input-lastname" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required account-email">
                                            <label for="input-email" class="control-label">E-Mail</label> <input type="text" name="email" value="{{ old('email') }}" placeholder="E-Mail" id="input-email" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required account-telephone">
                                            <label for="input-telephone" class="control-label">Telephone</label> <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="Telephone" id="input-telephone" class="form-control" />
                                            <!---->
                                        </div>
                                        <!---->
                                        <div class="form-group required account-pass hide">
                                            <label for="input-password" class="control-label">Password</label> 
                                            <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control"> <!---->
                                        </div>
                                        <div class="form-group required account-pass2 hide">
                                            <label for="input-confirm" class="control-label">Password Confirm</label> 
                                            <input type="password" name="password_confirmation" value="" placeholder="Password Confirm" id="input-confirm" class="form-control"> <!---->
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                                <div class="checkout-section payment-address">
                                    <div class="title section-title">Billing Address</div>
                                    <div class="section-body">
                                        <div>
                                            <div class="form-group required address-address-1">
                                                <label for="input-payment-address-1" class="control-label">Address 1</label>
                                                <input type="text" name="address_1" value="{{ old('address_1') }}" placeholder="Address 1" id="input-payment-address-1" class="form-control" />
                                                <!---->
                                            </div>
                                            <div class="form-group required address-city">
                                                <label for="input-payment-city" class="control-label">City</label> <input type="text" name="city" value="{{ old('City') }}" placeholder="City" id="input-payment-city" class="form-control" />
                                                <!---->
                                            </div>
                                            <div class="form-group required address-zone">
                                                <label for="input-payment-zone" class="control-label">Region / State</label>
                                                <select name="zone_id" id="input-payment-zone" class="form-control">
                                                    <option value=""> --- Please Select --- </option>
                                                    @foreach($regions as $region)
                                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                    @endforeach    
                                                </select>
                                            </div> 
                                        </div>
                                    </div>
                                </div>                            
                            @endif
                            <div class="checkout-section payment-address" style="padding-top: 0;">
                                <div class="section-body">
                                    <div class="checkbox checkout-same-address" style="margin-top: 0;">
                                        <label><input type="checkbox" name="same_billing_address" checked /> My delivery and billing addresses are the same.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-section shipping-address hide">
                                <div class="title section-title">Shipping Address</div>
                                <div class="section-body">
                                    <div>
                                        <div class="form-group required address-firstname">
                                            <label for="input-shipping-firstname" class="control-label">Name</label> <input type="text" name="shipping_firstname" value="{{ old('shipping_firstname') }}" placeholder="Name" id="input-shipping-firstname" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required address-address-1">
                                            <label for="input-shipping-address-1" class="control-label">Address</label> <input type="text" name="shipping_address_1" value="{{ old('shipping_address_1') }}" placeholder="Address 1" id="input-shipping-address-1" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required address-city">
                                            <label for="input-shipping-city" class="control-label">City</label> <input type="text" name="shipping_city" value="{{ old('shipping_city') }}" placeholder="City" id="input-shipping-city" class="form-control" />
                                            <!---->
                                        </div>
                                        <div class="form-group required address-zone">
                                            <label for="input-shipping-zone" class="control-label">Region / State</label>
                                            <select name="shipping_zone_id" id="input-shipping-zone" class="form-control">
                                                <option value=""> --- Please Select --- </option>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach    
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
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
                                                                <input type="radio" name="shipping_method" value="pickup" checked /> 
                                                                <span class="shipping-quote-title">Pickup From Store - 0৳</span>
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
                                                    <label><input type="radio" name="payment_method" value="cod" checked/> <span>Cash On Delivery</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-section cart-section">
                                    <div class="title section-title">Shopping Cart</div>
                                    <div class="section-body">
                                        <!---->
                                        <div class="table-responsive mobile-view-cart-product">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td class="text-center td-image">Image</td>
                                                        <td class="text-left td-product">Product Name</td>
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
                                                            <td class="text-left td-qty">
                                                                <div class="input-group btn-block" style="max-width: 200px;">
                                                                    <div class="stepper">
                                                                        <input type="text" class="form-control" name="quantity[{{ $item['id'] }}]" value="{{ $item['qty'] }}"/> <span>
                                                                            <i class="fa fa-angle-up"></i> <i class="fa fa-angle-down"></i></span>
                                                                    </div>
                                                                    <span class="input-group-btn">
                                                                        <button type="submit" name="action" value="update" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Update">
                                                                            <i class="fa fa-refresh"></i>
                                                                        </button>
                                                                        <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-remove" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td data-title="Unit Price">
                                                                @if($item['discount_percent'] > 0)
                                                                    <span class="text-decoration-line-through">
                                                                        {{ number_format($item['price'], 2) }}৳
                                                                    </span>
                                                                    <br>
                                                                    <span class="price-normal">
                                                                        {{ number_format($item['discount_price'], 2) }}৳
                                                                @else
                                                                    {{ $item['price'] }}৳
                                                                @endif
                                                            </td>
                                                            <td class="text-right td-total" data-title="Subtotal">{{ $item['subtotal'] }}৳</td>
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
                                    </div>
                                </div>
                                <div class="checkout-section confirm-section">
                                    <div class="title section-title">Confirm Your Order</div>
                                    <div class="section-body">
                                        <div class="section-comments"><textarea placeholder="Add Comments About Your Order" class="form-control" name="order_comment"></textarea></div>
                                        
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="privacy_policy" value="1" {{ old('privacy_policy') ? 'checked' : '' }} />I have read and agree to the <a href="#" class="agree"><b>Privacy Policy</b></a>
                                            </label>
                                            @error('privacy_policy')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="terms_conditions" value="1" {{ old('terms_conditions') ? 'checked' : '' }} />I have read and agree to the
                                                <a href="#" class="agree"><b>Terms &amp; Conditions</b></a>
                                            </label>
                                            @error('terms_conditions')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="buttons confirm-buttons">
                                            <div class="pull-right">
                                                <button type="submit" value="place_order" name="action" class="btn btn-primary"><span>Confirm Order</span></button>
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
            </form>    
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('input[name="same_billing_address"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('.shipping-address').addClass('hide');
            } else {
                $('.shipping-address').removeClass('hide');
            }
        });

        $('input[name="address_option"]').on('change', function () {
            if ($(this).val() === 'new') {
                $('.new-payment-address').removeClass('hide');
            } else {
                $('.new-payment-address').addClass('hide');
            }
        });
    });
</script>
@endsection