@extends('admin.admin')

@section('admin-content')
    <div class="billing-information-wrapper mb-2">

    </div>
    <div class="billing-information-wrapper">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-content table-responsive">
                    <table>
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Клиент</th>
                            <th>Сумма</th>
                            <th>Адрес</th>
                            <th>Тип оплаты</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr onclick="location.href = '{{route('admin.sale.info', [$sale->id])}}'">
                                <td>{{ $sale->created_at }}</td>
                                <td>{{ $sale->user->email }}</td>
                                <td>{{ $sale->total_price }}</td>
                                <td>{{ $sale->address }}</td>
                                <td>{{ $sale->payment_type }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    {{ $sales->links() }}

@endsection
