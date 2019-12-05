<?php

namespace App\Http\Controllers\User;

use App\Models\Cart\CartDetail;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
            $this->update($request, $cartDetail->value('id'));
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

    public function delete($id)
    {
        if ($cartDetails = CartDetail::find($id)) {
            $cartDetails->delete();
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        if ($cartDetails = CartDetail::find($id)) {
            $qty = $request->qty;
            $price = $cartDetails->productDetail->product->price;
            $totalPrice = $qty * $price;
            $cartDetails->update(['qty' => $qty, 'price' => $price, 'total_price' => $totalPrice]);
        }

        return back();
    }
}
