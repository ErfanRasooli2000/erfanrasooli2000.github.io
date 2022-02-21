<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('asset/css/admin.css')}}">
    <title>Admin Panel</title>
    @yield('style')
    <link rel="icon" type="image/x-icon" href="{{asset('asset/images/shop.png')}}">
</head>
<body>
<a href="{{route('admin.logout')}}" class="logout_admin">Logout</a>
<div class="navigation">
    <div class="icon">
        <i class="bi bi-cart-check-fill"></i>
    </div>
    <div class="nav-box">
        <div class="title-box">
            <i class="bi bi-bag-plus-fill"></i>
            <a id="productParent" href="#" class="nav-link">Product</a>
        </div>
        <ul id="productChild">
            <li><a href="{{route('product.index')}}" class="nav-link">All Products</a></li>
            <li><a href="{{route('product.create')}}" class="nav-link">New Product</a></li>
        </ul>
    </div>
    <div class="nav-box mt-2">
        <div class="title-box">
            <i class="bi bi-bookmark-plus-fill"></i>
            <a id="categoryParent" href="#" class="nav-link">Category</a>
        </div>
        <ul id="categoryChild">
            <li><a href="{{route('admin.subject.index')}}" class="nav-link">Subject</a></li>
            <li><a href="{{route('admin.category.index')}}" class="nav-link">Categories</a></li>
            <li><a href="{{route('admin.subcategory.index')}}" class="nav-link">Sub Cateogries</a></li>
        </ul>
    </div>
    <div class="nav-box mt-2">
        <div class="title-box">
            <i class="bi bi-cart-check-fill"></i>
            <a id="orderParent" href="#" class="nav-link">Orders</a>
        </div>
        <ul id="orderChild">
            <li><a href="{{route('admin.orders.new')}}" class="nav-link">New Orders</a></li>
            <li><a href="{{route('admin.orders.onway')}}" class="nav-link">On Way</a></li>
            <li><a href="{{route('admin.orders.deliverd')}}" class="nav-link">Deliverd</a></li>
        </ul>
    </div>
    <div class="nav-box mt-3">
        <div class="title-box">
            <i class="bi bi-file-earmark-text"></i>
            <a href="{{route('admin.detail.index')}}" class="nav-link">Details</a>
        </div>
    </div>
</div>
@yield('content')
<script src="{{url('asset/js/admin.js')}}"></script>
</body>
</html>
