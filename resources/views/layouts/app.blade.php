<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
<header class="header-area">
    <div class="header-bottom transparent-bar">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-5">
                    <div class="logo pt-39">
                        <a href="{{ route('home') }}"><img alt="" src="{{ asset('img/logo/logo.png') }}"></a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                    <div class="main-menu text-center">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Главная</a>
                                </li>
                                <li>
                                    <a href="{{ route('catalog') }}">Каталог</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-8 col-sm-8 col-7">
                    <div class="search-login-cart-wrapper">
                        <div class="header-search same-style">
                            <button class="search-toggle">
                                <i class="icon-magnifier s-open"></i>
                                <i class="ti-close s-close"></i>
                            </button>
                            <div class="search-content">
                                <form action="#">
                                    <input type="text" placeholder="Search">
                                    <button>
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="header-login same-style">
                            @guest
                                <a href="{{ route('login') }}"><i class="icon-user icons"></i></a>
                            @elseif (\Auth::user()->isAdmin())
                                <a href="{{ route('admin.index') }}"><i class="icon-user icons"></i></a>
                            @elseif (!(\Auth::user()->isAdmin()))
                                <a href="{{ route('account') }}"><i class="icon-user icons"></i></a>
                            @endguest
                        </div>
                        @if (($user = \Auth::user()) && !($user->isAdmin()))
                            <div class="header-cart same-style">
                                <button class="icon-cart">
                                    <i class="icon-handbag"></i>
                                    <span class="count-style">
                                        {{ $user->cartItems()->count() }}
                                    </span>
                                </button>
                                <div class="shopping-cart-content">
                                    @if ($user->cartItems()->count() != 0)
                                        <ul>
                                            @foreach($user->cartItems as $item)
                                                <li class="single-shopping-cart">
                                                    <div class="shopping-cart-img">
                                                        <a href="{{ route('product', [$item->productDetail->id]) }}"><img alt="" src="{{ asset($item->productDetail->image) }}"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="{{ route('product', [$item->productDetail->id]) }}">{{ $item->productDetail->product->brand->name }} {{ $item->productDetail->product->name }}</a></h4>
                                                        <h6>Кол-во: {{ $item->qty }}</h6>
                                                        <span>{{ $item->total_price }} BYN</span>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a onclick="event.preventDefault();$('#deleteCart').submit()" href="#"><i class="ti-close"></i></a>
                                                    </div>
                                                    <form id="deleteCart" method="POST" action="{{ route('cart.delete', [$item->id]) }}">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Total : <span class="shop-total">{{ $user->cartItems->sum('total_price') }} BYN</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a href="{{ route('account.cart') }}">Расширенная корзина</a>
                                            <a href="{{ route('account.checkout') }}">Перейти к оплате</a>
                                        </div>
                                    @else
                                        <div class="shopping-cart-empty text-center">
                                            Нет элементов
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mobile-menu-area electro-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="#">HOME</a>
                                    <ul>
                                        <li><a href="index.html">home version 1</a></li>
                                        <li><a href="index-2.html">home version 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li>
                                            <a href="about-us.html">about us</a>
                                        </li>
                                        <li>
                                            <a href="shop-page.html">shop page</a>
                                        </li>
                                        <li>
                                            <a href="shop-list.html">shop list</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html">product details</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">cart page</a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">checkout</a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">wishlist</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">contact us</a>
                                        </li>
                                        <li>
                                            <a href="my-account.html">my account</a>
                                        </li>
                                        <li>
                                            <a href="login-register.html">login / register</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Food</a>
                                    <ul>
                                        <li><a href="#">Dogs Food</a>
                                            <ul>
                                                <li><a href="shop-page.html">Grapes and Raisins</a></li>
                                                <li><a href="shop-page.html">Carrots</a></li>
                                                <li><a href="shop-page.html">Peanut Butter</a></li>
                                                <li><a href="shop-page.html">Salmon fishs</a></li>
                                                <li><a href="shop-page.html">Eggs</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Cats Food</a>
                                            <ul>
                                                <li><a href="shop-page.html">Meat</a></li>
                                                <li><a href="shop-page.html">Fish</a></li>
                                                <li><a href="shop-page.html">Eggs</a></li>
                                                <li><a href="shop-page.html">Veggies</a></li>
                                                <li><a href="shop-page.html">Cheese</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Fishs Food</a>
                                            <ul>
                                                <li><a href="shop-page.html">Rice</a></li>
                                                <li><a href="shop-page.html">Veggies</a></li>
                                                <li><a href="shop-page.html">Cheese</a></li>
                                                <li><a href="shop-page.html">wheat bran</a></li>
                                                <li><a href="shop-page.html">Cultivation</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">blog</a>
                                    <ul>
                                        <li>
                                            <a href="blog.html">blog page</a>
                                        </li>
                                        <li>
                                            <a href="blog-leftsidebar.html">blog left sidebar</a>
                                        </li>
                                        <li>
                                            <a href="blog-details.html">blog details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"> Contact us </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="footer-area">
    <div class="footer-bottom gray-bg-3 pt-17 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright text-center">
                        <p>2019. Все права защищены.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- all js here -->
<script src="{{ asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js"') }}"></script>
<script src="{{ asset('js/elevetezoom.js') }}"></script>
<script src="{{ asset('js/ajax-mail.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/ajax/user-account.js') }}"></script>
</body>
</html>
