@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'New Product'])

<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Product</div>
                        <div class="card-tools">
                            @include('backend.includes.back-button')
                        </div>
                    </div>
                    <form method="post" action="{{ route('admin.products.store'); }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">                            
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked />
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="stock_status" name="stock_status" value="1" checked />
                                        <label class="form-check-label" for="stock_status">Stock status</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" checked />
                                        <label class="form-check-label" for="is_featured">Is Featured</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required />
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="product_code" class="form-label">Product code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_code" name="product_code" value="{{ old('product_code') }}" required />
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="model" class="form-label">Model<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="category_id" class="form-label">Category<span class="text-danger">*</span></label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Choose...</option>
                                        @foreach($categories as $id => $parentName)
                                            <option value="{{ $id }}">{{ $parentName }}</option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="sub_category_id" class="form-label">Sub Category</label>
                                    <select class="form-select" id="sub_category_id" name="sub_category_id">
                                        <option value="">Choose...</option>  
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="product-description">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="product-description" name="description" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="quantity" class="form-label">Quantity<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required/>
                                </div>                            
                                <div class="col-sm-4 mb-3">
                                    <label for="sale_price" class="form-label">Sale price<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price') }}" required/>
                                </div>                     
                                <div class="col-sm-4 mb-3">
                                    <label for="original_price" class="form-label">Original price</label>
                                    <input type="text" class="form-control" id="original_price" name="original_price" value="{{ old('original_price') }}" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="brand_id" class="form-label">Brand</label>
                                <select class="form-select" id="brand_id" name="brand_id">
                                    <option value="">Choose...</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach    
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="first_image_url" class="form-label">First Image<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="first_image_url" name="first_image_url" value="{{ old('first_image_url') }}" required/>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="second_image_url" class="form-label">Second Image</label>
                                    <input type="file" class="form-control" id="second_image_url" name="second_image_url" value="{{ old('second_image_url') }}" />
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="gallery_images" class="form-label">Product Gallery<span class="text-danger">*</span></label>
                                    <input type="file" multiple class="form-control" id="gallery_images" name="gallery_images[]" value="{{ old('gallery_images') }}" required />
                                </div>
                            </div>    
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection