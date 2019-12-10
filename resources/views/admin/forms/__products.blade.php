@extends('admin.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Список товара</a></h5>
        </div>
        <div id="my-account-1" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="billing-information-wrapper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Категория</th>
                                        <th>Бренд</th>
                                        <th>Тип</th>
                                        <th>Название</th>
                                        <th>Размер</th>
                                        <th>Цена</th>
                                        <th>Описание</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)

                                                <tr>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ $product->brand->name }}</td>
                                                    <td>{{ $product->type->name }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->size }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <form action="{{ route('admin.product.info', [$product['id']]) }}" method="get">
                                                        <td class="product-remove"><button class="submit-button" type="submit" style="background-color: white; border: 0;"><i class="ti-pencil"></i></button></td>
                                                    </form>
                                                    <form action="{{ route('admin.product.delete', [$product['id']]) }}" method="POST">
                                                        @csrf
                                                        <td class="product-remove"><button class="submit-button" type="submit" style="background-color: white; border: 0;"><i class="ti-trash" onclick=""></i></button></td>
                                                    </form>
                                                </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-heading">
            <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Добавить новый рюкзак</a></h5>
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
                    <form action="{{ route('admin.product.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label for="">Категория</label>
                                    <select name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label for="">Бренд</label>
                                    <select name="brand_id">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label for="">Тип</label>
                                    <select name="type_id">
                                        @foreach($types as $type)
                                            <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Название</label>
                                    <input type="text" id="name" name="name" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Размер</label>
                                    <input type="text" id="size" name="size" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Цена</label>
                                    <input type="text" id="price" name="price" value="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="contact-form-style">
                                    <label>Описание</label>
                                    <textarea name="description" id="description"></textarea>
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
            <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Добавить новый цвет</a></h5>
        </div>
        <div id="my-account-3" class="panel-collapse collapse">
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
                    <form action="{{ route('admin.product.detail') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label for="">Продукт</label>
                                    <select name="product_id">
                                        @foreach($products as $product)
                                            <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label for="">Выберите цвет или введите новый</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="color_id">
                                                <option value="0" selected></option>
                                                @foreach($colors as $color)
                                                    <option value="{{ $color['id'] }}">{{ $color['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 billing-info">
                                            <input type="text" id="color" name="color" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Количество</label>
                                    <input type="text" id="count" name="count" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Изображение</label>
                                    <input type="file" id="image" name="image" value="">
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
