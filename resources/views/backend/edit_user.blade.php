
@extends('layouts.app')

@section('content')   
    
    @include('backend.includes.page-header', ['title' => 'Edit users'])
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Edit user</div>
                            <div class="card-tools">
                                @include('backend.includes.back-button')
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Type</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select Role</option>
                                        <option value="admin" {{ $user->getRoleNames()->first() == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="manager" {{ $user->getRoleNames()->first() == 'manager' ? 'selected' : '' }}>Manager</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>

                                

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                   
@endsection