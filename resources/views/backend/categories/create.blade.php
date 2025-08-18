@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'New Category'])

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
                        <div class="card-title">Category</div>
                        <div class="card-tools">
                            @include('backend.includes.back-button')
                        </div>
                    </div>
                    <form method="post" action="{{ route('admin.categories.store'); }}">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent(Category)</label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option value="">Choose...</option>
                                    @foreach($categories as $id => $parentName)
                                        <option value="{{ $id }}" {{ old('parent_id') == $id ? 'selected' : '' }}>{{ $parentName }}</option>
                                    @endforeach    
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" value="1" />
                                    <label class="form-check-label" for="status">Active</label>
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