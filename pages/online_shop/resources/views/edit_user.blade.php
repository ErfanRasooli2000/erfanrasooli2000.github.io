@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/profile.css')}}">
@endsection
@section('title','Profile Edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-1 col-2 mt-5">
                <a href="{{route('profile')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-arrow-left-square-fill"></i>
                    <p>Your Profile</p>
                </a>
                <a href="{{route('addresses')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-geo-alt-fill"></i>
                    <p>Set Your Address</p>
                </a>
                <a href="{{route('cart')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-bag-check-fill"></i>
                    <p>Your Cart</p>
                </a>
                <a href="{{route('change_password')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-gear-fill"></i>
                    <p>Change Password</p>
                </a>
            </div>
            <div class="col-6 mt-4 user-edit-form">
                <h3 class="text-center">Edit Your Profile</h3>
                <form class="w-100 d-flex flex-column justify-content-center align-items-center" action="{{route('user.update')}}" method="post">
                    @csrf
                    @method('put')
                    <input type="text" class="user-edit-input" placeholder="Name" name="name" value="{{$user->name}}">
                    @error('name')
                        <p class="error-alert">{{$errors->first('name')}}</p>
                    @enderror
                    <input type="email" class="user-edit-input" placeholder="Email" name="email" value="{{$user->email}}">
                    @error('email')
                    <p class="error-alert">{{$errors->first('email')}}</p>
                    @enderror
                    <input type="tel" class="user-edit-input" placeholder="Phone Number" name="phone" value="{{$user->phone}}">
                    @error('phone')
                    <p class="error-alert">{{$errors->first('phone')}}</p>
                    @enderror
                    <input type="submit" class="user-edit-submit" name="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
