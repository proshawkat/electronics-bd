@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'All users'])
    
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">All users</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.register') }}" class="btn btn-success">Add user</a>
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
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as  $customer)
                                        <tr class="align-middle">
                                            <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>
                                                @foreach($customer->getRoleNames() as $role)
                                                    <span class="badge bg-primary">{{ $role }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $customer->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $customer->id) }}" class="btn btn-sm btn-outline-info me-1">Edit</a>

                                                <form action="{{ route('admin.users.destroy', $customer->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger">
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
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $users->links('vendor.pagination.bootstrap-5') }}
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