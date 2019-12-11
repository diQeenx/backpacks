@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-color: gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Каталог товаров</h2>
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
                            </div>
                        </div>
                        <div class="grid-list-options">
                            <ul class="view-mode">
                                <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid4-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid-list-product-wrapper">
                        <div id="product_list" class="product-view product-grid">
                            <div id="a">
                                @include('catalog.products.product_list')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="shop-widget">
                            <h4 class="shop-sidebar-title">Поиск по названию</h4>
                            <div class="shop-search mt-25 mb-50">
                                <form id="search_catalog" action="{{ route('catalog.search') }}" method="GET" class="shop-search-form">
                                    <input type="text" id="search_catalog" name="name" placeholder="">
                                    <button type="submit">
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <form id="filter_form" action="{{ route('catalog.filter') }}">
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
@endsection
