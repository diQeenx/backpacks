@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-color: gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Welcome, {{ \Auth::user()->username }}</h2>
                <h3>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
                </h3>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- my account start -->
    <div class="my-account-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            @include('user.forms.__personal')
                            @include('user.forms.__change_password')
                            @include('user.forms.__cart')
                            @include('user.forms.__shopping_list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
