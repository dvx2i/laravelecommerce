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
                                    <b>Login</b> 
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
                                            <input id="email" type="email" class="form-control form-control-lg inverse-mode @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group m-b-20">
                                            <input type="password" class="form-control form-control-lg inverse-mode @error('email') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="current-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="checkbox checkbox-css m-b-20">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="login-buttons">
                                            <button type="submit" class="btn btn-success btn-block btn-lg"> {{ __('Login') }}</button>
                                            <a href="{{ route('register') }}" class="btn btn-default btn-block btn-lg"> {{ __('Register') }}</a>
                                        </div>
                
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
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
    
    <!-- begin login -->
    <!-- end login -->
</div>
@endsection
