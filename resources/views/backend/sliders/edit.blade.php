@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'Edit Slider'])

<div class="app-content">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Slider</div>
                        <div class="card-tools">
                            @include('backend.includes.back-button')
                        </div>
                    </div>

                    <form method="post" action="{{ route('admin.sliders.update', $slider->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            
                            {{-- Status --}}
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           id="status" name="status" value="1" 
                                           {{ old('status', $slider->status) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" 
                                       value="{{ old('title', $slider->title) }}" />
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" 
                                       id="link" name="link" 
                                       value="{{ old('link', $slider->link) }}" />
                                @error('link')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image<span class="text-danger">*</span>(Dimensions 960x400)</label>
                                <input type="file" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}"/>
                                <img src="{{ asset('public/'.$slider->image_url) }}" width="60">
                            </div>


                        </div>

                        {{-- Footer --}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection
