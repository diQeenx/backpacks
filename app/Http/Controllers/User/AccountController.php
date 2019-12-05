<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserPersonalDetails;
use App\Models\Card;
use App\Models\Country;
use App\Models\Product\Category;
use App\Models\UsersDetail;
use Illuminate\Http\Request;

class AccountController extends UserBaseController
{
    public function index()
    {
        $user = \Auth::user();
        $countries = Country::all();
        $cards = Card::all();
        return view('user.forms.__personal', ['user' => $user, 'countries' => $countries, 'cards' => $cards]);
    }

    public function edit(UserPersonalDetails $request)
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

    public function cart()
    {
        return view('user.forms.__cart');
    }
}
