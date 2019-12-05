<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
    </div>
    <div id="my-account-1" class="panel-collapse collapse show">
        <div class="panel-body">
            <div class="billing-information-wrapper">
                <div class="account-info-wrapper">
                    <h4>My Account Information</h4>
                    <h5>Your Personal Details</h5><br>
                    @if ($errors->first())
                        <div class="alert alert-danger text-center">
                            @foreach ($errors->all() as $error)
                                <div>
                                    {{$error}}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <form method="POST" action="{{ route('account.edit') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Имя</label>
                                <input type="text" id="first_name" name="first_name" value="{{ $user->detail->first_name ?? old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Фамилия</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $user->detail->last_name ?? old('last_name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Почта</label>
                                <input type="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Телефон</label>
                                <input type="text" id="phone" name="phone" value="{{ $user->detail->phone ?? old('phone') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Адрес</label>
                                <input type="text" id="address" name="address" value="{{ $user->detail->address ?? old('address') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Почтовый индекс</label>
                                <input type="text" id="zip_code" name="zip_code" value="{{ $user->detail->zip_code ?? old('zip_code') }}" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Номер карты</label>
                                <input type="text" id="card_number" name="card_number" placeholder="asdas" value="{{ $user->detail->card_number ?? old('card_number')}}" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                                <label>Действительна до</label>
                                <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/YYYY" value="{{ $user->detail->expiration_date ?? ''}}" >
                            </div>
                        </div>
                    </div>
                    <div class="billing-back-btn">
                        <div class="billing-btn"></div>
                        <div class="billing-btn">
                            <button type="submit">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
