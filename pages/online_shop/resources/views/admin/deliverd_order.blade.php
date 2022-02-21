@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Deliverd Orders</h4>
                    </div>
                </div>
                <div class="col-12 add-product">
                    <table class="mt-3">
                        <tr>
                            <th>User ID</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>ZipCode</th>
                            <th>Price</th>
                            <th>Receiver Name</th>
                            <th>Receiver Number</th>
                            <th>Deliver Time</th>
                            <th>Action</th>
                        </tr>
                        @php $count=0; @endphp
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->user_id}}</td>
                                <td>{{$order->country}}</td>
                                <td>{{$order->city}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->zipcode}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->receiver_name}}</td>
                                <td>{{$order->receiver_phone}}</td>
                                <td>{{$order->deliver_time}}</td>
                                <td><a href="/admin/order/show/{{$allid[$count]}}">show</a></td>
                                @php $count++; @endphp
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
