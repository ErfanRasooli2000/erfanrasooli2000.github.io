@extends('layout.login')
@section('title','Register')
@section('content')
    <div class="col-12 mt-5 mb-3">
        <p class="main-title">Online Shop</p>
    </div>
    <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 mx-auto box">
        <p class="title-header">Create account</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <p class="input-title">your Name</p>
            <input type="text" required name="name" value="{{old('name')}}">
            @error('name')
            <p class="error-alert">{{$errors->first('name')}}</p>
            @enderror
            <p class="input-title">Email</p>
            <input type="email" required name="email" value="{{old('email')}}">
            @error('email')
            <p class="error-alert">{{$errors->first('email')}}</p>
            @enderror
            <p class="input-title">Password</p>
            <input type="password" required name="password" placeholder="At Least 6 Charcter">
            @error('password')
            <p class="error-alert">{{$errors->first('password')}}</p>
            @enderror
            <p class="input-title">Re-enter Password</p>
            <input type="password" required name="password_confirmation" placeholder="Retype Password">
            @error('password_confirmation')
            <p class="error-alert">{{$errors->first('password-confirm')}}</p>
            @enderror
            <input type="submit" name="submit" class="signin_btn" value="Create Your Online Shop Account">
            <p class="agrement">By creating an account, you agree to Online Shop<a href="#">Conditions of Use</a> and <a href="#">Privacy Notice.</a> </p>
            <p class="agrement">Already have an account?  <a class="forgot-password" href="{{route('login')}}">Sign-In</a></p>
        </form>
    </div>
@endsection
