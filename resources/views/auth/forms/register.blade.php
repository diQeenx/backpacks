@extends('auth.auth')

@section('form')
    <div class="login-form-container">
        <div class="login-register-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    @if ($errors->has('username'))
                        <div class="bg-warning text-center" role="alert">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                    <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Никнейм" autofocus>
                </div>

                <div>
                    @if ($errors->has('password'))
                        <div class="bg-warning text-center" role="alert">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <input type="password" id="password" name="password" placeholder="Пароль">
                </div>

                <div>
                    @if ($errors->has('email'))
                        <div class="bg-warning text-center" role="alert">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail" >
                </div>

                <div class="button-box">
                    <button type="submit"><span>Зарегистрироваться</span></button>
                </div>
            </form>
        </div>
    </div>
@endsection
