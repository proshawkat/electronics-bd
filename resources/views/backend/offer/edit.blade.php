@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'Edit Offer Product'])
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3>Edit Offer</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Product</label>
                                <select name="product_id" class="form-control" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" 
                                            {{ $product->id == $offer->product_id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Minimum Quantity</label>
                                <input type="number" name="min_qty" class="form-control" required value="{{ $offer->min_qty }}">
                            </div>

                            <div class="mb-3">
                                <label>Discount Type</label>
                                <select name="discount_type" class="form-control">
                                    <option value="percent" {{ $offer->discount_type == 'percent' ? 'selected' : '' }}>Percentage (%)</option>
                                    <option value="fixed" {{ $offer->discount_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Discount Value</label>
                                <input type="number" step="0.01" name="discount_value" class="form-control" 
                                    value="{{ $offer->discount_value }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $offer->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$offer->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Offer</button>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>            
@endsection
