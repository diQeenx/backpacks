@extends('admin.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Список брендов</a></h5>
        </div>
        <div id="my-account-1" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>Изображение</th>
                                    <th>Название</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <form action="{{ route('admin.brand.delete', [$brand['id']]) }}" method="POST">
                                        @csrf
                                        <tr>
                                            <td class="product-thumbnail admin">
                                                <a href="#"><img src="{{ asset($brand['image']) }}" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="">{{ $brand['name'] }}</a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="product-remove"><button class="submit-button" type="submit" style="background-color: white; border: 0;"><i class="ti-trash" onclick=""></i></button></td>
                                        </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-heading">
            <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Добавить новую</a></h5>
        </div>
        <div id="my-account-2" class="panel-collapse collapse">
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
                    <form action="{{ route('admin.brand.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Название</label>
                                    <input type="text" id="name" name="name" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Изображение</label>
                                    <input type="file" id="image" name="img" value="">
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
@endsection
