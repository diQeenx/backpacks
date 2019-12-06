<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserPersonalDetails;
use App\Http\Requests\User\UserShippingAddress;
use App\Http\Requests\User\UserPaymentDetails;
use App\Models\Card;
use App\Models\Country;
use App\Models\UsersDetail;
use Illuminate\Http\Request;

class AccountController extends UserBaseController
{
    public function index()
    {
        $user = \Auth::user();
        $data = [
            'first_name' => isset($user->detail->first_name) ? $user->detail->first_name : null,
            'last_name' => isset($user->detail->last_name) ? $user->detail->last_name : null,
            'phone' => isset($user->detail->phone) ? $user->detail->phone : null,
            'email' => isset($user->email) ? $user->email : null,
            'name' => isset($user->name) ? $user->name : null,
            'country_id' => isset($user->detail->country_id) ? $user->detail->country_id : null,
            'city' => isset($user->detail->city) ? $user->detail->city : null,
            'address' => isset($user->detail->address) ? $user->detail->address : null,
            'zip_code' => isset($user->detail->zip_code) ? $user->detail->zip_code : null,
            'card_id' => isset($user->detail->zip_code) ? $user->detail->card_id : null,
            'card_number' => isset($user->detail->card_number) ? $user->detail->card_number : null,
            'month' => isset($user->detail->expiration_date) ? (explode('/', $user->detail->expiration_date))[0] : null,
            'months' => ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            'year' => isset($user->detail->expiration_date) ? (explode('/', $user->detail->expiration_date))[1] : null,
            'cvv' => isset($user->detail->cvv) ? $user->detail->cvv : null,
        ];
        $countries = Country::all();
        $cards = Card::all();
        return view('user.forms.__personal', ['user' => $data, 'countries' => $countries, 'cards' => $cards]);
    }

    public function editMain(UserPersonalDetails $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = \Auth::user()->id;

        if (UsersDetail::where('user_id', $data['user_id'])->exists()) {
            UsersDetail::where('user_id', $data['user_id'])->update($data);
            return back();
        }

        (new UsersDetail($data))->save();
        return back();
    }

    public function editAddress(UserShippingAddress $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = \Auth::user()->id;

        if (UsersDetail::where('user_id', $data['user_id'])->exists()) {
            UsersDetail::where('user_id', $data['user_id'])->update($data);
            return back();
        }

        (new UsersDetail($data))->save();
        return back();
    }

    public function editPayment(UserPaymentDetails $request)
    {
        $data = $request->except('_token', 'month', 'year');

        if (isset($request->month) && isset($request->year)) {
            $data['expiration_date'] = "{$request->month}/{$request->year}";
        }

        $data['user_id'] = \Auth::user()->id;

        if (UsersDetail::where('user_id', $data['user_id'])->exists()) {
            UsersDetail::where('user_id', $data['user_id'])->update($data);
            return back();
        }

        (new UsersDetail($data))->save();
        return back();
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();
    }
}
