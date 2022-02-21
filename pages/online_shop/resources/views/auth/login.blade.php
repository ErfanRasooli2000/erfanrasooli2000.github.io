@extends('layout.login')
@section('title','Log in')
@section('content')
    <div class="col-12 mt-5 mb-3">
        <p class="main-title">Online Shop</p>
    </div>
    <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 mx-auto box">
        <p class="title-header">Sign-In</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <p class="input-title">Email Address</p>
            <input type="email" name="email" value="{{old('email')}}">
            @error('email')
            <p class="error-alert">{{$errors->first('email')}}</p>
            @enderror
            <p class="input-title">Password</p>
            <input type="password" name="password">
            @error('password')
            <p class="error-alert">{{$errors->first('password')}}</p>
            @enderror
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <input type="submit" name="sign_in" class="signin_btn" value="Sign In">
            <p class="agrement">By continuing, you agree to  Online Shop<a href="#">Conditions of Use</a> and <a href="#">Privacy Notice.</a> </p>
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
    <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 mx-auto">
        <div class="position-relative">
            <hr>
            <p class="new-to">New to Online Shop?</p>
        </div>
        <a class="new-account" href="{{route('register')}}">Create your online Shop Account</a>
    </div>
@endsection
