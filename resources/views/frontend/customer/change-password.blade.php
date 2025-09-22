@extends('layouts.frontend')
@section('content')
<div id="account-login" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <div class="mt-3">
                <h2>Change Password</h2>

                <form action="{{ route('customer.password.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control" required style="width:100%;max-width:100%;">
                        @error('current_password') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control" required style="width:100%;max-width:100%;">
                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required style="width:100%;max-width:100%;"> 
                    </div>

                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
        @include('frontend.partials.account-menu')
    </div>    
</div>    
@endsection
