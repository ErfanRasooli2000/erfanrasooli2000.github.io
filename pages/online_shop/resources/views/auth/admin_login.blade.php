@extends('layout.login')
@section('title','Admin Log-in')
@section('content')
    <div class="col-12 mt-5 mb-3">
        <p class="main-title">Online Shop</p>
    </div>
    <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 mb-5 mx-auto box">
        <p class="title-header">Admin Log In</p>
        <form method="POST" action="{{ route('admin.login.submit') }}">
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
            <input type="submit" name="sign_in" class="signin_btn" value="Log In">
        </form>
    </div>
@endsection
