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
                <h4>Недавно добавленные</h4>
            </div>
            <div class="row justify-content-center">
                @foreach($products as $key => $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrapper mb-10">
                            <div class="product-img bg-white">
                                <a href="{{ route('product', [$key]) }}">
                                    <img src="{{ asset($product['image']) }}" class="p-1" alt="">
                                </a>
                            </div>
                            <div class="product-content text-center">
                                <h4><a href="{{ route('product', [$key]) }}">{{ $product['name'] }}</a></h4>
                                <div class="product-price">
                                    <span class="new">{{ $product['price'] }} BYN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-content text-center mb-30 service-color-2">
                        <img src="{{ asset('img/icon-img/support.png') }}" alt="">
                        <h4>КРУГЛОСУТОЧНАЯ ПОДДЕРЖКА</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-content text-center mb-30 service-color-3">
                        <img src="{{ asset('img/icon-img/money.png') }}" alt="">
                        <h4>ВОЗВРАТ СРЕДСТВ</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
