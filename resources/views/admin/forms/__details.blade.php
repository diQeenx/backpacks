@extends('admin.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">{{ $product->brand->name }} {{ $product->name }}</a></h5>
        </div>
        <div id="my-account-1" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="billing-information-wrapper">
                    <form action="{{ route('admin.product.update', [$product->id]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label>Категория</label>
                                    <select name="category_id">
                                        @foreach($categories as $category)
                                            <option @if($category->id === $product->category_id) selected @endif
                                            value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label>Бренд</label>
                                    <select name="brand_id">
                                        @foreach($brands as $brand)
                                            <option @if($brand->id === $product->brand_id) selected @endif
                                            value="{{ $brand->id }}">{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-select">
                                    <label>Тип</label>
                                    <select name="type_id">
                                        @foreach($types as $type)
                                            <option @if($type->id === $product->type_id) selected @endif
                                            value="{{ $type->id }}">{{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Название</label>
                                    <input type="text" name="name" value="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Размер</label>
                                    <input type="text" name="size" value="{{ $product->size }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info">
                                    <label>Цена</label>
                                    <input type="text" name="price" value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="contact-form-style">
                                    <label>Описание</label>
                                    <textarea name="description" id="description">{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 pl-0 pr-15">
                            <div class="product-list-action-center">
                                <button type="submit">Изменить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel-heading">
            <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Список цветов</a></h5>
        </div>
        <div id="my-account-2" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="billing-information-wrapper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Изображение</th>
                                        <th>Цвет</th>
                                        <th>Количество</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->details as $detail)
                                            <tr>
                                                <td class="product-thumbnail admin">
                                                    <a href="#"><img src="{{ asset($detail['image']) }}" alt=""></a>
                                                </td>
                                                <td class="product-name">{{ $detail->color->name }}</td>
                                                <td>{{ $detail->count }}</td>
                                                <td></td>
                                                <td></td>
                                                <form action="{{ route('admin.product.detail.delete', [$detail->id]) }}" method="POST">
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
    </div>
@endsection
