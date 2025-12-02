@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'All Offer Products'])
<!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h3>All Offers</h3>
                            <a href="{{ route('admin.offers.create') }}" class="btn btn-primary">Add New Offer</a>
                        </div>
                    </div>    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Min Qty</th>
                                        <th>Discount Type</th>
                                        <th>Discount Value</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($offers as $offer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $offer->product->name }}</td>
                                            <td>{{ $offer->min_qty }}</td>
                                            <td>
                                                <span class="badge bg-info">{{ $offer->discount_type }}</span>
                                            </td>
                                            <td>{{ $offer->discount_value }}</td>
                                            <td>
                                                @if($offer->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.offers.edit', $offer->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                                <form class="d-inline" action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    {{ $offers->links() }}

                </div>
            </div>
        </div>
    </div>
</div>                
@endsection
