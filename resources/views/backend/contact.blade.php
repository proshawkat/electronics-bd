@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'Contact Us'])
    
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Contacts Message</h3>
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
                                    <th>Topic</th>
                                    <th>Message</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as  $customer)
                                        <tr class="align-middle">
                                            <td>{{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->topic }}</td>
                                            <td>{{ $customer->message }}</td>
                                            <td>{{ $customer->created_at }}</td>
                                        </tr> 
                                    @endforeach                               
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $contacts->links('vendor.pagination.bootstrap-5') }}
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