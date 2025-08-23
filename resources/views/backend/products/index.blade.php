@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'Products'])
    
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">All Products</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Stock Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($products as  $product)
                                        <tr class="align-middle">
                                            <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                                            <td><img src="{{ asset('public/'.$product->first_image_url) }}" width="60"></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                                {!! $product->stock_status ? '<span class="badge bg-success">in_stock</span>' : '<span class="badge bg-danger">out_stock</span>' !!}
                                            </td>
                                            <td>
                                                {!! $product->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product->id); }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to delete?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr> 
                                    @endforeach   
                                </tbody>                                
                            </table>
                        </div>    
                    </div>
                    <!-- /.card-body -->
                   <div class="card-footer clearfix">
                        {{ $products->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection