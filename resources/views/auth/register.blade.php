@extends('layouts.app')

@section('content')
<div class="section-container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">                
                <div class="card-body">
                    <div class="login login-v1">
                        <!-- begin login-container -->
                        <div class="login-container">
                            <!-- begin login-header -->
                            <div class="login-header">
                                <div class="brand">
                                    <b>Register</b> 
                                </div>
                            </div>
                            <!-- end login-header -->
                            <!-- begin login-body -->
                            <div class="login-body p-30">
                                <!-- begin login-content -->
                                <div class="login-content">
                                    <form method="POST" action="{{ route('login') }}" class="margin-bottom-0">
                                        @csrf
                                        <div class="form-group m-b-20">
                                            <input id="name" type="text" class="form-control form-control-lg inverse-mode @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group m-b-20">
                                            <input id="email" type="email" class="form-control form-control-lg inverse-mode @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group m-b-20">
                                            <input type="password" class="form-control form-control-lg inverse-mode @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group m-b-20">
                                            <input type="password" class="form-control form-control-lg inverse-mode" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password" />
                                            
                                        </div>
                                        <div class="login-buttons">
                                            <button type="submit" class="btn btn-success btn-block btn-lg"> {{ __('Register') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end login-content -->
                            </div>
                            <!-- end login-body -->
                        </div>
                        <!-- end login-container -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
