@extends('layouts.app')

@section('content')   

@include('backend.includes.page-header', ['title' => 'Edit Brand'])

<div class="app-content">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Brand</div>
                        <div class="card-tools">
                            @include('backend.includes.back-button')
                        </div>
                    </div>

                    <form method="post" action="{{ route('admin.brands.update', $brand->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" 
                                       value="{{ old('name', $brand->name) }}" />
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Status --}}
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           id="status" name="status" value="1" 
                                           {{ old('status', $brand->status) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
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
