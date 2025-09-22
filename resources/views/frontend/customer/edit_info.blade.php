@extends('layouts.frontend')

@section('content')  
<div id="account-edit" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <form action="{{ route('customer.store_edit_info') }}" method="POST">
                @csrf
                @method('PUT')
                <div id="account">
                    <legend>Your Personal Details</legend>
                    <div class="form-group required account-firstname">
                        <label class="col-sm-2 control-label" for="input-firstname">First Name </label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name" value="{{ $user->first_name }}" placeholder="First Name" id="input-firstname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required account-lastname">
                        <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name" id="input-lastname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required account-email">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{ $user->email }}" placeholder="E-Mail" id="input-email" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required account-telephone">
                        <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                        <div class="col-sm-10">
                            <input type="tel" name="telephone" value="{{ $user->phone }}" placeholder="Telephone" id="input-telephone" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-left"><a href="{{ route('customer.dashboard') }}" class="btn btn-default">Back</a></div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                    </div>
                </div>
            </form>
        </div>
        @include('frontend.partials.account-menu')
    </div>
</div>
@endsection