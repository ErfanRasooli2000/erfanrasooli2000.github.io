@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/profile.css')}}">
@endsection
@section('title','User Profile')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 pt-1 mt-5">
                <h2 class="text-center">Your Account</h2>
            </div>
            <div class="col-11">
                <div class="container-fluid">
                    <div class="row justify-content-evenly">
                        <div class="col-4 profile-part">
                            <div class="profile-part-img-holder">
                                <img src="{{url('asset/images/account.png')}}" alt="img">
                            </div>
                            <a href="{{route('user.edit')}}" class="profile-part-content ms-3 text-decoration-none text-body">
                                <h5>Your Profile</h5>
                                <p class="p-0 m-0">Edit Name , Email ,<br> Mobile Number and Add Address</p>
                            </a>
                        </div>
                        <div class="col-4 profile-part">
                            <div class="profile-part-img-holder">
                                <img src="{{url('asset/images/archived.png')}}" alt="img">
                            </div>
                            <div class="profile-part-content ms-3">
                                <h5>Archived orders</h5>
                                <p class="p-0 m-0">View and Manage Your Orders</p>
                            </div>
                        </div>
                        <div class="col-4 profile-part">
                            <div class="profile-part-img-holder">
                                <img src="{{url('asset/images/orders.png')}}" alt="img">
                            </div>
                            <div class="profile-part-content ms-3">
                                <h5>Your orders</h5>
                                <p class="p-0 m-0">Track , return , or buy things again</p>
                            </div>
                        </div>
                        <div class="col-4 profile-part">
                            <div class="profile-part-img-holder">
                                <img src="{{url('asset/images/payments.png')}}" alt="img">
                            </div>
                            <div class="profile-part-content ms-3">
                                <h5>Your Payments</h5>
                                <p class="p-0 m-0">View all Transactions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
