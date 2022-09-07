@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/store_user">
                        @csrf
                        @if (Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>  
                        @endif
                        @if (Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>  
                        @endif
                        <div class="row mb-3">
                            <label for="user_register_name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="user_register_name" type="text" class="form-control" name="user_register_name" value="{{ old('user_register_name') }}" required autocomplete="nameuser_register_name" autofocus>

                                @error('user_register_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_register_email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="user_register_email" type="email" class="form-control"  name="user_register_email" value="{{ old('user_register_email') }}" required autocomplete="email">

                                @error('user_register_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_register_pass" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="user_register_pass" type="password" class="form-control" name="user_register_pass" required>

                                @error('user_register_pass')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_register_confirm_pass" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="user_register_confirm_pass" type="password" class="form-control" name="user_register_confirm_pass" required autocomplete="new-pasword">
                            @error('user_register_confirm_pass')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                <a class="btn btn-link" href="/">
                                    {{__('Already have a Account? Sign In')}}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
