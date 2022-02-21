@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>All Products</h4>
                    </div>
                </div>
                <div class="col-12 last_products">
                    <h4>ALL PRODUCTS</h4>
                    <table>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{0}}</td>
                            <td><a class="text-decoration-none" href="#">Show</a></td>
                            <td><a class="text-decoration-none" href="{{route('product.edit',['id'=>$product->id])}}">Edit</a></td>
                            <td>
                                <form action="{{route('product.destroy',['id'=>$product->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="no-button" type="submit" value="DELETE" name="submit">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
