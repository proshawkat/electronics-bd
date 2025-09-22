
@extends('layouts.frontend')

@section('content')  
<div id="account-address" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <form action="{{ route('customer.add_address') }}" method="post" class="form-horizontal">
                @csrf
                <div id="address">
                    <div class="form-group required address-firstname">
                        <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required address-lastname">
                        <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
                        </div>
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
                        <label class="col-sm-2 control-label" for="input-address-1">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address_1" value="" placeholder="Address" id="input-address-1" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required address-city">
                        <label class="col-sm-2 control-label" for="input-city">City</label>
                        <div class="col-sm-10">
                            <input type="text" name="city" value="" placeholder="City" id="input-city" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group required address-zone">
                        <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
                        <div class="col-sm-10">
                            <select name="zone_id" id="input-zone" class="form-control">
                                <option value=""> --- Please Select --- </option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                </div>
                <div class="buttons clearfix">
                    <div class="pull-left"><a href="{{ route('customer.address') }}" class="btn btn-default">Back</a></div>
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