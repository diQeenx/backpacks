@extends('user.account')

@section('user-content')
    <div class="cart-main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Цвет</th>
                                    <th>Цена, BYN</th>
                                    <th>Кол-во</th>
                                    <th>Стоимость, BYN</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($positions as $key => $position)

                                        <tr>
                                            <td class="product-name"><a href="{{ route('product', [$position['product_id']]) }}">{{ $position['product_name'] }}</a></td>
                                            <td>{{ $position['color'] }}</td>
                                            <td class="product-price-cart">{{ $position['price'] }}</td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qty" value="{{ $position['qty'] }}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">{{ $position['total'] }}</td>
                                            <form action="{{ route('cart.delete', [$key]) }}" method="POST">
                                                @csrf
                                                <td class="product-remove"><button class="submit-button" type="submit" style="background-color: white; border: 0;"><i class="ti-trash" onclick=""></i></button></td>
                                            </form>
                                        </tr>
                                @endforeach
                                <tr>
                                    <td class="product-name">Итого</td>
                                    <td class="product-price-cart"></td>
                                    <td></td>
                                    <td></td>
                                    <td class="product-subtotal">{{ $total }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{ route('catalog') }}">Продолжить</a>
                                        <button>Обновить</button>
                                    </div>
                                    <div class="cart-shiping-update">
                                        <a href="{{ route('account.checkout') }}">Перейти к оплате</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
