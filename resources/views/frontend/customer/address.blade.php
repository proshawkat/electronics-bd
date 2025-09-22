
@extends('layouts.frontend')

@section('content')  
<div id="account-address" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tbody>
                        @foreach($addresses as $address)
                            <tr>
                                <td class="text-left">
                                    {{ $address->first_name }} {{ $address->last_name }}, {{ $address->address_1 }}, {{ $address->city }}, {{ $address->region?->name }}
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('customer.edit_address', $address->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('customer.delete_address', $address->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
            <div class="buttons clearfix">
                <div class="pull-left"><a href="{{ route('customer.dashboard') }}" class="btn btn-default">Back</a></div>
                <div class="pull-right"><a href="{{ route('customer.new_address') }}" class="btn btn-primary">New Address</a></div>
            </div>
        </div>
        @include('frontend.partials.account-menu')
    </div>
</div>
@endsection