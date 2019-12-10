<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product\ProductDetails;

class ProductController extends Controller
{
    public function index(int $id)
    {
        if (ProductDetails::find($id)->product->details->sum('count') > 0) {
            $product = ProductDetails::find($id)->product;
            return view('catalog.products.product_detail', compact('product'));
        }
        return back();
    }
}
