@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-color: gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Shop Page</h2>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li class="active">Shop Page</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-100 pb-100 gray-bg">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper">
                        <div class="product-sorting-wrapper">
                            <div class="product-show shorting-style">
                                <label>Showing <span>1-20</span> of <span>100</span> Results</label>
                                <select>
                                    <option value="">12</option>
                                    <option value="">24</option>
                                    <option value="">36</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid-list-options">
                            <ul class="view-mode">
                                <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid4-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid-list-product-wrapper">
                        <div class="product-view product-grid">
                            @yield('products')
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="shop-widget">
                            <h4 class="shop-sidebar-title">Поиск по названию</h4>
                            <div class="shop-search mt-25 mb-50">
                                <form class="shop-search-form">
                                    <input type="text" placeholder="Find a product">
                                    <button type="submit">
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <form action="{{ route('catalog.filter') }}">
                            <div class="shop-widget mt-20">
                                <label>Цена</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="billing-info">
                                            <input type="number" min="0" value="{{ old('price_begin') ?? 0 }}" name="price_begin" placeholder="от">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="billing-info">
                                            <input type="number" min="0" name="price_end" value="{{ old('price_end') ?? 999999 }}" placeholder="до" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-widget mt-20">
                                <div class="billing-select card-mrg">
                                    <label>Категория</label>
                                    <select name="category">
                                        <option selected></option>
                                        @foreach($data['categories'] as $category)
                                            <option  value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="shop-widget mt-20">
                                <div class="billing-select card-mrg">
                                    <label>Бренд</label>
                                    <select name="brand">
                                        <option selected></option>
                                        @foreach($data['brands'] as $brand)
                                            <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="shop-widget mt-20">
                                <div class="billing-select card-mrg">
                                    <label>Тип</label>
                                    <select name="type">
                                        <option selected></option>
                                        @foreach($data['types'] as $type)
                                            <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="shop-widget mt-20">
                                <div class="product-list-action-center">
                                    <button type="submit">Показать</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="ti-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img src="{{ asset('img/quick-view/l1.jpg') }}" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal2" role="tabpanel">
                                    <img src="{{ asset('img/quick-view/l2.jpg') }}" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal3" role="tabpanel">
                                    <img src="{{ asset('img/quick-view/l3.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="quick-view-list nav" role="tablist">
                            <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                <img src="{{ asset('img/quick-view/s1.jpg') }}" alt="">
                            </a>
                            <a href="#modal2" data-toggle="tab" role="tab">
                                <img src="{{ asset('img/quick-view/s2.jpg') }}" alt="">
                            </a>
                            <a href="#modal3" data-toggle="tab" role="tab">
                                <img src="{{ asset('img/quick-view/s3.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3>Dog Calcium Food</h3>
                            <div class="product-price">
                                <span>$19.00 </span>
                            </div>
                            <div class="product-rating">
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do amt tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">XS</option>
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value=""> L</option>
                                        <option value="">XL</option>
                                        <option value="">XXL</option>
                                    </select>
                                </div>
                                <div class="select-option-part">
                                    <label>Color*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">orange</option>
                                        <option value="">pink</option>
                                        <option value="">yellow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="quickview-plus-minus">
                                <div class="cart-plus-minus">
                                    <input type="text" value="2" name="qtybutton" class="cart-plus-minus-box">
                                </div>
                                <div class="quickview-btn-cart">
                                    <a class="btn-style" href="#">add to cart</a>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
