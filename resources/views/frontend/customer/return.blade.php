
@extends('layouts.frontend')

@section('content') 
<div id="account-order" class="container">
    <div class="row">
        <div id="content" class="col-sm-9">
            <h3>Return Request for Order #{{ $order->order_code }}</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('customer.return.store', $order->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment">Reason for Return</label>
                    <textarea name="comment" id="comment" class="form-control" rows="4" required>{{ old('comment') }}</textarea>
                    @error('comment')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-danger mt-2">Submit Return Request</button>
                <a href="{{ route('customer.order') }}" class="btn btn-secondary mt-2">Cancel</a>
            </form>
        </div> 
        @include('frontend.partials.account-menu')   
    </div>    
</div>
@endsection