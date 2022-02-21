@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/profile.css')}}">
@endsection
@section('title','Addresses')
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-1 col-2 mt-5">
                <a href="{{route('profile')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-arrow-left-square-fill"></i>
                    <p>Your Profile</p>
                </a>
                <a href="{{route('user.edit')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-person-lines-fill"></i>
                    <p>Edit Profile</p>
                </a>
                <a href="{{route('cart')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-bag-check-fill"></i>
                    <p>Your Cart</p>
                </a>
                <a href="{{route('change_password')}}" class="profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-gear-fill"></i>
                    <p>Change Password</p>
                </a>
                <a href="{{route('addresses')}}" class="mt-5 profile-sidebar d-flex align-content-center text-decoration-none text-body">
                    <i class="bi bi-plus-lg"></i>
                    <p>Add Address</p>
                </a>
            </div>
            <div class="col-6 mt-4 user-edit-form">
                <h3 class="text-center">Edit Address</h3>
                <form class="w-100 d-flex flex-column justify-content-center align-items-center" action="{{route('addresses.update',[$address->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" class="user-edit-input" placeholder="Country" name="country" value="{{$address->country}}">

                    @error('country')
                    <p class="error-alert">{{$errors->first('country')}}</p>
                    @enderror

                    <input type="text" class="user-edit-input" placeholder="City" name="city" value="{{$address->city}}">

                    @error('city')
                    <p class="error-alert">{{$errors->first('city')}}</p>
                    @enderror

                    <textarea name="address" class="user-edit-textarea" placeholder="Your Full address">{{$address->address}}</textarea>

                    @error('address')
                    <p class="error-alert">{{$errors->first('address')}}</p>
                    @enderror

                    <input type="number" class="user-edit-input" placeholder="ZipCode" name="zipcode" value="{{$address->zipcode}}">

                    @error('zipcode')
                    <p class="error-alert">{{$errors->first('zipcode')}}</p>
                    @enderror

                    <input type="text" class="user-edit-input" placeholder="Receiver Name" name="receiver_name" value="{{$address->receiver_name}}">

                    @error('receiver_name')
                    <p class="error-alert">{{$errors->first('receiver_name')}}</p>
                    @enderror

                    <input type="number" class="user-edit-input" placeholder="Receiver Phone" name="receiver_phone" value="{{$address->receiver_phone}}">

                    @error('receiver_phone')
                    <p class="error-alert">{{$errors->first('receiver_phone')}}</p>
                    @enderror

                    <input type="submit" class="user-edit-submit" name="submit" value="Edit Address">
                </form>
            </div>
        </div>
    </div>
@endsection
