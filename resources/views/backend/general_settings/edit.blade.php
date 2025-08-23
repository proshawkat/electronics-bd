@extends('layouts.app')

@section('content')

@include('backend.includes.page-header', ['title' => 'General Settings'])

<!--begin::App Content-->
<div class="app-content">
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">

                    <form action="{{ route('admin.general-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Site Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $settings->name) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $settings->email) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $settings->phone) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Second Phone</label>
                                    <input type="text" class="form-control" name="second_phone" value="{{ old('second_phone', $settings->second_phone) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address', $settings->address) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Google Map URL</label>
                                    <input type="url" class="form-control" name="google_map" value="{{ old('google_map', $settings->google_map) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Facebook URL</label>
                                    <input type="url" class="form-control" name="facebook" value="{{ old('facebook', $settings->facebook) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">YouTube URL</label>
                                    <input type="url" class="form-control" name="youtube" value="{{ old('youtube', $settings->youtube) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Twitter URL</label>
                                    <input type="url" class="form-control" name="twitter" value="{{ old('twitter', $settings->twitter) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Instagram URL</label>
                                    <input type="url" class="form-control" name="instagram" value="{{ old('instagram', $settings->instagram) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">WhatsApp URL</label>
                                    <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                    @if($settings->logo)
                                        <img src="{{ asset('public/'.$settings->logo) }}" width="100" class="mt-2">
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Settings</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>    
@endsection
