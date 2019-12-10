@extends('layouts.app')

@section('content')
    <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-color: gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Checkout</h2>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area start -->
    <div class="checkout-area pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
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
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <form action="{{ route('account.checkout.add') }}" method="POST">
                                @csrf
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Информация о получателе</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Имя</label>
                                                            <input type="text" name="first_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Фамилия</label>
                                                            <input type="text" name="last_name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">Адрес доставки</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="shipping-information-wrapper">
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input type="radio" id="current_shipping_address" checked value="current" name="address_radio">
                                                        <label>Использовать основной адрес</label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input type="radio" id="new_shipping_address" value="new" name="address_radio">
                                                        <label>Указать новый</label>
                                                    </div>
                                                </div>
                                                <div id="new-address" style="display: none">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-select">
                                                                <label>Страна</label>
                                                                <select name="country_id">
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Город</label>
                                                                <input type="text" id="city" name="city">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Адрес</label>
                                                                <input type="text" id="address" name="address">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Почтовый индекс</label>
                                                                <input type="text" id="zip_code" name="zip_code" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-3">Способ оплаты</a></h5>
                                    </div>
                                    <div id="payment-3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input type="radio" checked="" value="no_card" name="payment">
                                                        <label>Наличные / Оплата по почте</label>
                                                    </div>
                                                    <div class="single-ship">
                                                        <input type="radio" value="card" name="payment">
                                                        <label>Кредитная карта (сохраненная)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>4</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-4">Предпросмотр заказа</a></h5>
                                    </div>
                                    <div id="payment-4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="order-review-wrapper">
                                                <div class="order-review">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="width-1">Название</th>
                                                                    <th class="width-2">Цена</th>
                                                                    <th class="width-3">Кол-во</th>
                                                                    <th class="width-4">Итого</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($user->cartItems as $item)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="o-pro-dec">
                                                                                <p>{{ $item->productDetail->product->brand->name }} {{$item->productDetail->product->name}} ( {{ $item->productDetail->color->name }} )</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="o-pro-price">
                                                                                <p>{{ $item->price }}</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="o-pro-qty">
                                                                                <p>{{ $item->qty }}</p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="o-pro-subtotal">
                                                                                <p>{{ $item->total_price }}</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td colspan="3">К оплате:</td>
                                                                <td colspan="1">{{ $user->cartItems->sum('total_price') }}</td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <span>
                                                            Забыли товар?
                                                            <a href="{{ route('account.cart') }}"> Изменить мою корзину</a>

                                                        </span>
                                                        <div class="billing-btn">
                                                            <button type="submit">Оформить заказ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="checkout-progress">
                        <h4>Checkout Progress</h4>
                        <ul>
                            <li>Billing Address</li>
                            <li>Shipping Address</li>
                            <li>Shipping Method</li>
                            <li>Payment Method</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
