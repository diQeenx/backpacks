@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-color: gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Панель администратора</h2>
            </div>
        </div>
    </div>
    <!-- my account start -->
    <div class="my-account-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="checkout-wrapper">
                        @yield('admin-content')
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span><i class="icon icon-bag"></i></span> <a>Навигация </a></h5>
                                </div>
                                <div>
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <div class="product-list-action-center">
                                                <button onclick="location.href = '{{route('admin.category')}}'">Категории</button>
                                                <button onclick="location.href = '{{route('admin.brand')}}'">Бренды</button>
                                                <button onclick="location.href = '{{route('admin.product')}}'">Виды</button>
                                                <button onclick="location.href = '{{route('admin.product')}}'">Продукты</button>
                                                <button onclick="location.href = '{{route('account.cart')}}'">Продажи</button>
                                                <button onclick="location.href = '{{route('account.cart')}}'">Клиенты</button>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit">Выход</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-list-action-left">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
