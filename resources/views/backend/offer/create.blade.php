@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'Offer Product'])
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
                        <h3>Create New Offer</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.offers.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Product</label>
                                <select name="product_id" class="form-control" required>
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Minimum Quantity</label>
                                <input type="number" name="min_qty" class="form-control" required min="1">
                            </div>

                            <div class="mb-3">
                                <label>Discount Type</label>
                                <select name="discount_type" class="form-control" required>
                                    <option value="percent">Percentage (%)</option>
                                    <option value="fixed">Fixed Amount</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Discount Value</label>
                                <input type="number" step="0.01" name="discount_value" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Save Offer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
