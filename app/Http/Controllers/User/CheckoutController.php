<?php

namespace App\Http\Controllers\User;

use App\Models\Cart\CartDetail;
use App\Models\Country;
use App\Models\Sale\Sale;
use App\Models\Sale\SaleProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutSale;

class CheckoutController extends UserBaseController
{
    public function index()
    {
        $user = auth()->user();
        if ($user->cartItems->count() !== 0) {
            $countries = Country::all();
            return view('user.checkout', ['user' => $user, 'countries' => $countries]);
        } else {
            return redirect(route('account.cart'));
        }
    }

    public function add(CheckoutSale $request)
    {
        $user = auth()->user();
        $data = $request->except('_token');
        $newData = [];

        if ($data['address_radio'] === "current") {
                $newData['address'] = $user->detail->country->name . ', ' . $user->detail->city . ', ' . $user->detail->address . ', ' . $user->detail->zip_code;
        } else {
            $country = Country::find($data['country_id']);
            $newData['address'] = $country->name . ', ' . $data['city'] . ', ' . $data['address'] . ', ' . $data['zip_code'];
        }

        $newData['user_id'] = $user->id;
        $newData['first_name'] = $data['first_name'];
        $newData['last_name'] = $data['last_name'];
        $newData['total_price'] = $user->cartItems->sum('total_price');
        if ($data['payment'] === "no_card") {
            $newData['payment_type'] = "Наличные";
        } else {
            $newData['payment_type'] = "Картой";
            $newData['card'] = $user->detail->card_number ?? null;
        }

        (new Sale($newData))->save();

        $sale = (Sale::orderBy('created_at', 'DESC')->first())->id;

        $this->addSaleProducts($user, $sale);

        return back();
    }

    public function addSaleProducts($user, $sale)
    {
        $data['sale_id'] = $sale;
        foreach ($user->cartItems as $cartItem) {
            $data['name'] = $cartItem->productDetail->product->name;
            $data['color'] = $cartItem->productDetail->color->name;
            $data['brand'] = $cartItem->productDetail->product->brand->name;
            $data['category'] = $cartItem->productDetail->product->category->name;
            $data['type'] = $cartItem->productDetail->product->type->name;
            $data['qty'] = $cartItem->qty;
            $data['price'] = $cartItem->price;

            $res = (new SaleProduct($data))->save();

            if ($res) {
                $user->cartItems()->delete();
            }
        }
    }
}
