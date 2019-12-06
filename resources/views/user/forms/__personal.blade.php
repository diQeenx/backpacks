@extends('user.account')

@section('user-content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Основная информация</a></h5>
        </div>
        <div id="my-account-1" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="billing-information-wrapper">
                    @if ($errors->first())
                        <div class="account-info-wrapper">
                            <div class="alert alert-danger text-center">
                                @foreach ($errors->all() as $error)
                                    <div>
                                        {{$error}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('account.edit.main') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Имя</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ $user['first_name'] ?? old('first_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Фамилия</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ $user['last_name'] ?? old('last_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Почта</label>
                                    <input type="email" value="{{ $user['email'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Телефон</label>
                                    <input type="text" id="phone" name="phone" value="{{ $user['phone'] ?? old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 pl-0 pr-15">
                            <div class="product-list-action-center">
                                <button type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-heading">
            <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Адрес доставки</a></h5>
        </div>
        <div id="my-account-2" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="billing-information-wrapper">

                    <form method="POST" action="{{ route('account.edit.address') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label>Страна</label>
                                    <select name="country_id">
                                        <option selected></option>
                                        @foreach($countries as $country)
                                            <option @if($country->id === $user['country_id']) selected @endif
                                                    value="{{ $country->id }}">{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Город</label>
                                    <input type="text" id="city" name="city" value="{{ $user['city'] ?? old('city') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Адрес</label>
                                    <input type="text" id="address" name="address" value="{{ $user['address'] ?? old('address') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Почтовый индекс</label>
                                    <input type="text" id="zip_code" name="zip_code" value="{{ $user['zip_code'] ?? old('zip_code') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 pl-0 pr-15">
                            <div class="product-list-action-center">
                                <button type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Безналичный способ оплаты</a></h5>
            </div>
            <div id="my-account-3" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="payment-info-wrapper">
                        <form action="{{ route('account.edit.payment') }}" method="POST">
                            @csrf
                            <div class="payment-info">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-select card-mrg">
                                            <label>Тип карты</label>
                                            <select name="card_id">
                                                <option selected></option>
                                                @foreach($cards as $key => $card)
                                                    <option @if($key == $user['card_id']) selected @endif
                                                        value="{{ $key }}">{{ $card['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info">
                                            <label>Номер карты</label>
                                            <input type="text" id="card_number" name="card_number" value="{{ $user['card_number'] ?? old('card_number')}}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="expiration-date">
                                    <label>Срок действия </label>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-select month-mrg">
                                                <select name="month">
                                                    <option selected>Месяц</option>
                                                    @foreach($user['months'] as $key => $month)
                                                        <option @if($user['month'] == $key) selected @endif value="{{ $key }}">{{ $month }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-select">
                                                <select name="year">
                                                    <option selected>Год</option>
                                                    @for($i = date('Y', time()); $i < date('Y', time()) + 10; $i++)
                                                        <option @if($user['year'] == $i) selected @endif  value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info">
                                            <label>CVV</label>
                                            <input type="text" name="cvv" value=" {{ $user['cvv'] ?? old('cvv') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 pl-0 pr-15">
                                <div class="product-list-action-center">
                                    <button type="submit">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
