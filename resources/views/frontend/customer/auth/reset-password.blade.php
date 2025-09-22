@extends('layouts.frontend')
@section('content')
@extends('layouts.frontend')

@section('content')  
<div id="account-address" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <h2>Reset Password</h2>

            <form action="{{ route('customer.password.resetupdate') }}" method="POST">
                @csrf
                <fieldset>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ request()->get('email') }}"> 
                    <div class="form-group required">
                        <label class="col-sm-12" for="input-email">New Password</label>
                        <div class="col-sm-12">
                            <input type="password" name="password" placeholder="New Password" class="form-control" required>
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>    
                    </div>    
                    <div class="form-group required">
                        <label class="col-md-12" for="input-email">Confirm New Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password_confirmation" placeholder="Confirm New Password" class="form-control" required>
                        </div>    
                    </div>    
                </fieldset>
                <div class="buttons clearfix">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>    
            </form>
        </div>
        @include('frontend.partials.account-menu')    
    </div>        
</div>    
@endsection
