@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'sliders'])
    
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">All Brands</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.sliders.create') }}" class="btn btn-success">Add Slider</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as  $slider)
                                        <tr class="align-middle">
                                            <td>{{ ($sliders->currentPage() - 1) * $sliders->perPage() + $loop->iteration }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td><img src="{{ asset('public/'.$slider->image_url) }}" width="60"></td>
                                            <td>{{ $slider->link }}</td>
                                            <td>
                                                {!! $slider->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.sliders.edit', $slider->id); }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to delete?');">
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
                        {{ $sliders->links('vendor.pagination.bootstrap-5') }}
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