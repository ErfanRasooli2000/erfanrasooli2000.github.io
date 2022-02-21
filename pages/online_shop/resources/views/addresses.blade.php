@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/profile.css')}}">
@endsection
@section('title','Addresses')
@section('content')
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-2 mt-5">
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
            </div>
            <div class="col-4 mt-4 user-edit-form">
                <h3 class="text-center">Add Address</h3>
                <form class="w-100 d-flex flex-column justify-content-center align-items-center" action="{{route('addresses.create')}}" method="post">
                    @csrf
                    <input type="text" class="user-edit-input" placeholder="Country" name="country" value="{{old('country')}}">

                    @error('country')
                        <p class="error-alert">{{$errors->first('country')}}</p>
                    @enderror

                    <input type="text" class="user-edit-input" placeholder="City" name="city" value="{{old('city')}}">

                    @error('city')
                    <p class="error-alert">{{$errors->first('city')}}</p>
                    @enderror

                    <textarea name="address" class="user-edit-textarea" placeholder="Your Full address">{{old('address')}}</textarea>

                    @error('address')
                    <p class="error-alert">{{$errors->first('address')}}</p>
                    @enderror

                    <input type="number" class="user-edit-input" placeholder="ZipCode" name="zipcode" value="{{old('zipcode')}}">

                    @error('zipcode')
                    <p class="error-alert">{{$errors->first('zipcode')}}</p>
                    @enderror

                    <input type="text" class="user-edit-input" placeholder="Receiver Name" name="receiver_name" value="{{old('receiver_name')}}">

                    @error('receiver_name')
                    <p class="error-alert">{{$errors->first('receiver_name')}}</p>
                    @enderror

                    <input type="number" class="user-edit-input" placeholder="Receiver Phone" name="receiver_phone" value="{{old('receiver_phone')}}">

                    @error('receiver_phone')
                    <p class="error-alert">{{$errors->first('receiver_phone')}}</p>
                    @enderror

                    <input type="submit" class="user-edit-submit" name="submit" value="ADD ADDRESS">
                </form>
            </div>
            <div class="col-6 mt-4">
                <h3 class="text-center">Your Addresses</h3>
                <table class="mt-3">
                    <tr>
                        <th>Address</th>
                        <th>Receiver</th>
                        <th>Action</th>
                    </tr>
                    @foreach($addresses as $address)
                        <tr>
                            <td>{{$address->country}}-{{$address->city}}-{{$address->address}}</td>
                            <td class="w-25">{{$address->receiver_name}}</td>
                            <td>
                                <a class="text-decoration-none edit-btn" href="/profile/addresses/edit/{{$address->id}}">Edit</a>
                                <form action="{{route('addresses.destroy',[$address->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="delete-btn" type="submit" value="Delete" name="submit">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
