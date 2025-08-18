@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'Category'])
    
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">All Categories and Sub categories</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add Category</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as  $category)
                                        <tr class="align-middle">
                                            <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                {{ $category->parent?->name ?? '---' }}
                                            </td>
                                            <td>
                                                {!! $category->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $category->id); }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to delete?');">
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
                        {{ $categories->links('vendor.pagination.bootstrap-5') }}
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