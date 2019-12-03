@extends('layouts.app')

@section('content')
    <div class="login-register-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a href="{{ route('login') }}">
                                <h4> Вход </h4>
                            </a>
                            <a href="{{ route('register') }}">
                                <h4> Регистрация </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            @yield('form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
