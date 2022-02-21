<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="online,shop,digikala,amazoon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('asset/css/style.css')}}">
    @yield('style')
    <link rel="icon" type="image/x-icon" href="{{asset('asset/images/shop.png')}}">
    <meta name="author" content="Erfan Rasooli">
    <title>@yield('title')</title>
</head>
<body>
<div class="all-navigation">
    <div id="allNavOverly" class="all-navigation-overley"></div>
    <div id="navContent" class="all-navigation-menu">
        <div class="all-navigation-user d-flex justify-content-start align-items-center">
            @auth
                <a class="d-flex align-items-center text-decoration-none text-white" href="#">
                    <i class=" ms-4 bi bi-person-circle"></i>
                    <h5 class="p-0 m-0 ms-3">Hello, {{auth()->user()->name}}</h5>
                </a>
            @else
                <a class="d-flex align-items-center text-decoration-none text-white" href="{{route('login')}}">
                    <i class=" ms-4 bi bi-person-circle"></i>
                    <h5 class="p-0 m-0 ms-3">Hello, Sign in</h5>
                </a>
            @endauth
        </div>
        <div class="all-navigation-content">
            <ul>
                <li class="navigation-content-title">
                    <h5>Shop By Department</h5>
                </li>
                @foreach(\App\Models\Subject::all() as $subject)
                    <li onclick="clickedNav({{$subject->id}})" id="menu{{$subject->id}}" class="menu_nav">
                        <p class="fws">{{$subject->name}}</p>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <ul class="sub_menu" id="submenu{{$subject->id}}">
                        @foreach(\App\Models\Category::where('subject_id',$subject->id)->get() as $category)
                            <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
            <hr>
        </div>
    </div>
    <div id="allNavClose" class="all-navigation-close">
        <i class="bi bi-x"></i>
    </div>
</div>


<div class="container-fluid navigation1">
    <div class="row align-items-center">
        <div class="col-5 col-sm-6 col-md-5 col-lg-4 col-xxl-3 d-flex justify-content-between align-items-center order-md-first">
            <h1><a class="text-decoration-none text-white" href="{{route('home')}}">Online Shop</a></h1>
            <div class="deliver d-none d-sm-block">
                <p class="p-0 m-0 title_deliver">Deliver To</p>
                <div class="d-flex flex-row justify-content-start align-items-center">
                    <i class="bi bi-geo-alt text-white"></i>
                    <p class="text-white p-0 m-1 deliver_address">@auth  @else Iran,Islamic Rep... @endauth</p>
                </div>
            </div>
        </div>
        <div class="col-7 col-sm-5 offset-sm-1 col-md-3 offset-md-0 col-lg-4 col-xl-3 d-flex justify-content-around align-items-center text-white order-md-1">
            <a class="d-flex flex-column text-decoration-none text-white" href="{{route('profile')}}">
                <p class="p-0 m-0 user_name text-white">Hello, @auth {{auth()->user()->name}} @else {{'Guest'}} @endauth</p>
                <p class="text-white p-0 m-0 account_and_list">Account & Lists</p>
            </a>
            @auth
                <form class="d-flex text-align-center" method='post' action="{{route('logout')}}">
                    @csrf
                    @method('POST')
                    <input class="text-white p-0 m-1 border-0 spcolor" type="submit" value="Logout">
                    <i class="fs-4 bi bi-box-arrow-in-left"></i>
                </form>
            @else
                <div class="signin_btn">
                    <a class="text-decoration-none text-white d-flex align-items-center" href="{{route('login')}}">
                        <h6 class="mb-1 fs-5 d-none d-lg-flex">sign in >&nbsp;</h6>
                        <i class="fas fa-user fs-4"></i>
                    </a>
                </div>
            @endauth
            <div class="basket-icon">
                <a class="text-decoration-none text-white" href="{{route('cart')}}"><i class="fas fa-shopping-cart fs-4"></i></a>
            </div>
        </div>
        <div class="col-12 mb-3 d-flex justify-content-between align-items-center col-sm-10 offset-sm-1 col-md-4 offset-md-0 mb-md-0 order-md-0 col-lg-4 col-xl-5 col-xxl-6">
            <div class="search">
                <input class="w-100" id="searchText" type="text" name="search" placeholder="Search">
                <select name="search_filter">
                    <option value="0">All</option>
                @foreach(\App\Models\Subject::all() as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
                <div class="search-btn">
                    <a class="text-decoration-none text-white" id="searchBtnEnter" href="#"><i class="fas fa-search"></i></a>
                </div>
                <div id="search_results" class="search_results">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid navigation2">
    <div class="row">
        <div class="col-12">
            <ul class="d-flex flex-nowrap justify-content-start mb-0 ps-0 nav2">
                <li>
                    <a  id="sideNavClick" class="all-menu d-flex flex-row justify-content-center align-items-center" href="#">
                        <i class="bi bi-list"></i>
                        <p >All</p>
                    </a>
                </li>
                <li class="d-flex flex-row justify-content-center align-items-center"><a href="#"><p>Buy Again</p></a></li>
                <li class="d-flex flex-row justify-content-center align-items-center"><a href="{{route('favourites')}}"><p>Favourites</p></a></li>
                <li class="d-flex flex-row justify-content-center align-items-center"><a href="#"><p>Today's Deal</p></a></li>
            </ul>
        </div>
    </div>
</div>

@yield('content')

<div class="container-fluid footers">
    <div class="row">
        <div class="footer">
            <ul class="d-flex flex-wrap justify-content-evenly ps-0 mb-0">
                <li><div><a href="#">Onlineshop.com</a></div></li>
                <li><div><a href="#">Your Lists</a></div></li>
                <li><div><a href="#">Customer Service</a></div></li>
                <li><div><a href="#">Your Orders</a></div></li>
                <li><div><a href="#">Your Account</a></div></li>
                <li><div><a href="#">Sell Producs</a></div></li>
            </ul>
            <hr class="text-white m-0">
            <p class="text-white text-center m-0 creted-by">Created By Erfan Rasooli &copy 2021</p>
        </div>
    </div>
</div>

<script src="{{url('asset/js/search.js')}}"></script>
<script src="{{url('asset/js/allNav.js')}}"></script>
@yield('javascript')
<script>

    window.addEventListener("load",f1);
    function f1()
    {
        let ch=document.documentElement.clientHeight;
        let oh=document.documentElement.offsetHeight;
        if(oh>=ch)
        {
            document.querySelector(".footers").classList.add("static");
        }
        else
        {
            document.querySelector(".footers").classList.add("fixed");

        }
    }
</script>
</body>
</html>
