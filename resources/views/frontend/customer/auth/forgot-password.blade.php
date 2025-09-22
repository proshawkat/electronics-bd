@extends('layouts.frontend')
@section('content')
<div id="account-login" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <h2>Forgot Password</h2>
            <p>Enter the e-mail address associated with your account. Click submit to have a password reset link e-mailed to you.</p>
            <form action="{{ route('customer.password.email') }}" method="POST" class="form-horizontal">
                @csrf
                <fieldset>
                    <legend>Your E-Mail Address</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </fieldset>  
                <div class="buttons clearfix">
                    <div class="pull-left">
                        <a href="{{ route('customer.login') }}" class="btn btn-default">Back</a>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><span>Send Reset Link</span></button>
                    </div>
                </div>
            </form>
        </div>
        @include('frontend.partials.account-menu')
    </div>    
</div>    
@endsection
