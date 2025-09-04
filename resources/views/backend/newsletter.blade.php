@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'NewsLetter'])
    
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">All NewsLetters</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($newsletters as  $letter)
                                        <tr class="align-middle">
                                            <td>{{ ($newsletters->currentPage() - 1) * $newsletters->perPage() + $loop->iteration }}</td>
                                            <td>{{ $letter->email }}</td>
                                            <td>{{ $letter->created_at }}</td>
                                        </tr> 
                                    @endforeach                               
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $newsletters->links('vendor.pagination.bootstrap-5') }}
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