@extends('layouts.app')

@section('content')
    <div class="slider-area">
        <div class="slider-active owl-dot-style owl-carousel">
            <div class="single-slider pt-100 pb-100 yellow-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 col-sm-7">
                            <div class="slider-content slider-animated-1 pt-114">
                                <h3 class="animated">Рюкзак - лучший друг путешественника</h3>
                                <h1 class="animated">Для всех возрастов</h1>
                                <div class="slider-btn">
                                    <a class="animated" href="{{ route('catalog') }}">Ознакомиться</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 col-sm-5">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="{{ asset('img/product/backpack-travel-main.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="food-category food-category-col pt-100 pb-60">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-4">
                        <div class="single-food-category cate-padding-1 text-center mb-30">
                            <a href="{{ route('catalog') }}">
                                <div class="single-food-hover-2">
                                    <img src="{{ asset( $category['image'] ) }}" alt="">
                                </div>
                                <div class="single-food-content">
                                    <h3>{{ $category['name'] }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="product-area pt-95 pb-70 gray-bg">
        <div class="container">
            <div class="section-title text-center mb-55">
                <h4>Наиболее популярные</h4>
                <h2>Недавно добавленные</h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-4.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Dog Calcium Food</a></h4>
                            <div class="product-price">
                                <span class="new">$20.00 </span>
                                <span class="old">$50.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-5.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Cat Buffalo Food</a></h4>
                            <div class="product-price">
                                <span class="new">$22.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-6.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Legacy Dog Food</a></h4>
                            <div class="product-price">
                                <span class="new">$50.00 </span>
                                <span class="old">$70.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-7.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Chicken Dry Cat Food</a></h4>
                            <div class="product-price">
                                <span class="new">$60.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-8.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Stomach Dog Food</a></h4>
                            <div class="product-price">
                                <span class="new">$70.00 </span>
                                <span class="old">$90.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-9.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Nourish Puppy Food</a></h4>
                            <div class="product-price">
                                <span class="new">$80.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-10.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Tarpaulin Dog Food</a></h4>
                            <div class="product-price">
                                <span class="new">$10.00 </span>
                                <span class="old">$30.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrapper mb-10">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('img/product/product-11.jpg') }}" alt="">
                            </a>
                            <div class="product-action">
                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="ti-plus"></i>
                                </a>
                                <a title="Add To Cart" href="#">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="product-action-wishlist">
                                <a title="Wishlist" href="#">
                                    <i class="ti-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html">Dog Calcium Food</a></h4>
                            <div class="product-price">
                                <span class="new">$22.00 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service-area bg-img pt-100 pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="service-content text-center mb-30 service-color-1">
                        <img src="{{ asset('img/icon-img/shipping.png') }}" alt="">
                        <h4>БЕСПЛАТНАЯ ДОСТАВКА</h4>
                        <p>Free shipping on all order </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-content text-center mb-30 service-color-2">
                        <img src="{{ asset('img/icon-img/support.png') }}" alt="">
                        <h4>КРУГЛОСУТОЧНАЯ ПОДДЕРЖКА</h4>
                        <p>Online support 24 hours a day</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-content text-center mb-30 service-color-3">
                        <img src="{{ asset('img/icon-img/money.png') }}" alt="">
                        <h4>ВОЗВРАТ СРЕДСТВ</h4>
                        <p>Back guarantee under 5 days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
