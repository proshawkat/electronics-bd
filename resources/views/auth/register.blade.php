@extends('layouts.app')

@section('content')  
@include('backend.includes.page-header', ['title' => 'New User'])
<!--begin::App Content-->
<div class="app-content">
        <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Create new user</div>
                        <div class="card-tools">
                            @include('backend.includes.back-button')
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf
                        <div class="card-body">    
                            <div class="mb-3">
                                <label for="role" class="form-label">Type</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>
                            <!-- Name -->
                            <div class="mb-3">
                                <x-input-label for="name" class="form-label" :value="__('Name')" />
                                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-input-label for="email" class="form-label" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <x-input-label for="password" class="form-label" :value="__('Password')" />

                                <x-text-input id="password" class="form-control"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" class="form-control"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>            
@endsection