@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'New Slider'])

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
                        <div class="card-title">Slider</div>
                        <div class="card-tools">
                            @include('backend.includes.back-button')
                        </div>
                    </div>
                    <form method="post" action="{{ route('admin.sliders.store'); }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" checked value="1" />
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}" />
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