<?php

namespace App\Http\Controllers\User;

use App\Models\Cart\Cart;
use App\Models\Cart\CartDetail;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends UserBaseController
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        $details = $product->details;
        $product_details_id = null;
        $cart_id = Auth::user()->cart->id;
        foreach ($details as $detail) {
            if ($detail->color->id === (int)$request->color_id) {
                $product_details_id = $detail->id;
                break;
            }
        }

        $qty = (int)$request->qty;
        $price = $product->price;
        $total_price = $qty * $price;

        if (($cartDetail = CartDetail::where(['cart_id' => $cart_id, 'product_details_id' => $product_details_id]))->exists()) {
            $this->updateDetail($request, $cartDetail->value('id'));
        } else {
            CartDetail::create([
                'cart_id' => $cart_id,
                'product_details_id' => $product_details_id,
                'qty' => $qty,
                'price' => $price,
                'total_price' => $total_price
            ]);
        }

        return back();
    }

    public function deleteDetail($id)
    {
        if ($cartDetails = CartDetail::find($id)) {
            $cartDetails->delete();
        }

        return back();
    }

    public function updateDetail(Request $request, $id)
    {
        if ($cartDetails = CartDetail::find($id)) {
            $qty = $request->qty;
            $price = $cartDetails->productDetail->product->price;
            $totalPrice = $qty * $price;
            $cartDetails->update(['qty' => $qty, 'price' => $price, 'total_price' => $totalPrice]);
        }

        return back();
    }

    public function show()
    {
        $user = auth()->user();

        $positions = [];
        foreach ($user->cartItems as $item) {
            $positions[$item->id] = [
                'product_id' => $item->productDetail->id,
                'product_name' => "{$item->productDetail->product->brand->name} {$item->productDetail->product->name}",
                'color' => $item->productDetail->color->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'total' => $item->total_price,
            ];
        }
        $grand_total = $user->cartItems->sum('total_price');
        $cart_id = $user->cart->id;

        return view('user.forms.__cart', ['positions' => $positions, 'total' => $grand_total, 'cart_id' => $cart_id]);
    }
}
