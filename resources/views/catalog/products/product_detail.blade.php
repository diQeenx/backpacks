@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-color: gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Информация о продукте</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li class="active">Информация о продукте</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-img">
                        <img id="zoompro" src="{{ asset(($product->details()->first())->image) }}" />
                        <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
                            @foreach($product->details as $detail)
                                <a data-image="{{ asset($detail->image) }}">
                                    <img src="{{ asset($detail->image) }}" alt="">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-content">
                        <h2>{{ $product->brand->name }} {{ $product->name }}</h2>
                        <div class="product-price">
                            <span class="new">{{ $product->price }} BYN</span>
                        </div>
                        <div class="in-stock">
                            @if($product->details->sum('count') === 0)
                                <span><i class="ion-android-checkbox-outline"></i>Нет в наличии</span>
                            @else
                                <span><i class="ion-android-checkbox-outline"></i>В наличии</span>
                            @endif
                        </div>
                        <p>{{'Рюкзак '.$product->type->name.', '.$product->category->name.'. '.$product->size.' см'}}</p>
                        <p>{{$product->description ?? null}}</p>
                        <form id="addtocart" method="POST" action="{{ route('cart.add') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="product-details-style shorting-style mt-30">
                                <label>Цвет:</label>
                                <select name="color_id">
                                    @foreach($product->colors as $color)
                                        <option value="{{ $color->id }}">{{ strtolower($color->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="quality-wrapper mt-30 product-quantity">
                                <label>Количество:</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qty" value="1">
                                </div>
                            </div>
                        </form>
                        <div class="product-list-action">
                            <div class="product-list-action-left">
                                <a onclick="$('#addtocart').submit()" class="addtocart-btn" href="#" title="Add to cart">
                                    <i class="ion-bag"></i>
                                    Добавить в корзину
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-product-area pt-95 pb-80 gray-bg">
        <div class="container">
            <div class="section-title text-center mb-55">
                <h4>Most Populer</h4>
                <h2>Related Products</h2>
            </div>
            <div class="related-product-active owl-carousel">
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img src="{{asset('img/product/product-4.jpg')}}" alt="">
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
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img src="{{asset('img/product/product-5.jpg')}}" alt="">
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
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img src="{{asset('img/product/product-6.jpg')}}" alt="">
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
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img src="{{asset('img/product/product-7.jpg')}}" alt="">
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
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img src="{{asset('img/product/product-8.jpg')}}" alt="">
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
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img src="{{asset('img/product/product-9.jpg')}}" alt="">
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
        </div>
    </div>
@endsection
