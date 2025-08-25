@extends('layouts.frontend')

@section('content')   

<div id="account-register" class="container">
    <div class="row">
        <div id="content" class="col-sm-9 register-page">
            <p>If you already have an account with us, please login at the <a href="{{ route('customer.login') }}">login page</a>.</p>
            <form action="https://www.citytechbd.com/index.php?route=account/register" method="post" enctype="multipart/form-data" class="register-form form-horizontal">
                <div id="account">
                    <legend>Your Personal Details</legend>
                    <div class="form-group required account-customer-group" style="display:  none ;">
                        <label class="col-sm-2 control-label">Customer Group</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="customer_group_id" value="1" checked="checked" />
                                    Default
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group required account-firstname">
                        <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required account-lastname">
                        <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required account-email">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required account-telephone">
                        <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                        <div class="col-sm-10">
                            <input type="tel" name="telephone" value="" placeholder="Telephone" id="input-telephone" class="form-control" />
                        </div>
                    </div>
                </div>
                <fieldset>
                    <legend>Your Password</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label account-pass" for="input-password">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required account-pass2">
                        <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control" />
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Newsletter</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Subscribe</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="newsletter" value="1" />
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="newsletter" value="0" checked="checked" />
                                No
                            </label>
                        </div>
                    </div>
                </fieldset>

                <div class="buttonss">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                I have read and agree to the <a href="https://www.citytechbd.com/index.php?route=information/information/agree&amp;information_id=3" class="agree"><b>Privacy Policy</b></a>
                            </label>
                        </div>
                    
                        <button type="submit" class="btn btn-primary" data-loading-text="&lt;span&gt;Continue&lt;/span&gt;"><span>Continue</span></button>
                    </div>    
                </div>
            </form>
        </div>
        @include('frontend.partials.account-menu')
    </div>
</div>
@endsection