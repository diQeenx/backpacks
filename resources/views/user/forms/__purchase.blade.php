@extends('user.account')

@section('user-content')
    <div class="panel panel-default">
        @foreach($sales as $key => $sale)
            <div class="panel-heading">
                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-{{$key}}">{{ $sale->created_at }}</a></h5>
            </div>
            <div id="my-account-{{$key}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="billing-information-wrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Получатель</label>
                                    <input type="text" value="{{ $sale->first_name }} {{ $sale->last_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Адрес</label>
                                    <input type="text" value="{{ $sale->address }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Способ оплаты</label>
                                    <input type="text" value="{{ $sale->payment_type }}">
                                </div>
                            </div>
                            @if ($sale->payment_type == 'Картой')
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info">
                                        <label>Номер карты</label>
                                        <input type="text" value="{{ $sale->card }}">
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Итоговая стоимость</label>
                                    <input type="text" value="{{ $sale->total_price }} BYN">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Цвет</th>
                                            <th>Бренд</th>
                                            <th>Категория</th>
                                            <th>Тип</th>
                                            <th>Кол-во</th>
                                            <th>Цена, BYN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sale->products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->color }}</td>
                                                <td>{{ $product->brand }}</td>
                                                <td>{{ $product->category }}</td>
                                                <td>{{ $product->type }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>{{ $product->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $sales->links() }}
    </div>
    {{--<div class="cart-main-area">
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

                                <form action="" method="POST">
                                    @csrf
                                    <tr>
                                        <td class="product-name"><a href=""></a></td>
                                        <td></td>
                                        <td class="product-price-cart"></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="">
                                            </div>
                                        </td>
                                        <td class="product-subtotal"></td>
                                        <td class="product-remove"><button class="submit-button" type="submit" style="background-color: white; border: 0;"><i class="ti-trash" onclick=""></i></button></td>
                                    </tr>
                                </form>
                            <tr>
                                <td class="product-name">Итого</td>
                                <td class="product-price-cart"></td>
                                <td></td>
                                <td></td>
                                <td class="product-subtotal"></td>
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
                                        <a href="">Продолжить</a>
                                        <button>Обновить</button>
                                    </div>
                                    <div class="cart-shiping-update">
                                        <a href="">Перейти к оплате</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
