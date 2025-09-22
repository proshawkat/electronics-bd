@extends('layouts.frontend')

@section('content')   
<div id="account-login" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <div class="row login-box">
                <div class="col-sm-6">
                    <div class="well">
                        <h2 class="title">New Customer</h2>
                        <p><strong>Register Account</strong></p>
                        <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                        <div class="buttons">
                            <div class="pull-right">
                                <a href="{{ route('customer.register') }}" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well">
                        <h2 class="title">Returning Customer</h2>
                        <p><strong>I am a returning customer</strong></p>
                        <form action="{{ route('customer.login') }}" method="post" class="form-horizontal login-form">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail Address</label>
                                <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-password">Password</label>
                                <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                                <div><a href="{{ route('customer.password.request') }}" target="_top">Forgotten Password</a></div>
                            </div>
                            <div class="buttons">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary" data-loading-text="&lt;span&gt;Login&lt;/span&gt;"><span>Login</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.partials.account-menu')
    </div>
</div>
@endsection