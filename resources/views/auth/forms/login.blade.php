@extends('auth.auth')

@section('form')
    <div class="login-form-container">
        <div class="login-register-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    @if ($errors->has('email'))
                        <div class="bg-warning text-center" role="alert">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <input type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail" autofocus>
                </div>

                <div>
                    @if ($errors->has('password'))
                        <div class="bg-warning text-center" role="alert">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Пароль" >
                </div>
                <div class="button-box">
                    <div class="login-toggle-btn">
                        <input type="checkbox">
                        <label>Remember me</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit"><span>Войти</span></button>
                </div>
            </form>
        </div>
    </div>
@endsection
