<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="online,shop,digikala,amazoon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('asset/css/login.css')}}">
    <meta name="author" content="Erfan Rasooli">
    <title>@yield('title')</title>
</head>
<body>

<div class="container">
    <div class="row flex-column justify-content-center">
    @yield('content')
        <div class="col-10 col-sm-9 col-md-7 col-lg-7 col-xl-5 mx-auto">
            <hr class="d-block shadow-lg">
            <ul class="footer d-flex flex-row justify-content-center align-items-center m-0 p-0">
                <li><a href="#">Conditions of Use</a></li>
                <li><a href="#">Privacy Notice</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <p class="text-center footer-bottom pt-2">&copy; 2022, online-shop.com, Inc. or its affiliates</p>
        </div>
    </div>
</div>
</body>
