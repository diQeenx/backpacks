<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Models\Product\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);

        $products = Product::orderBy('created_at', 'DESC')->limit(4)->get();

        $data = [];

        foreach ($products as $product) {
            if ($product->details->count() !== 0 && $product->details->sum('count') != 0) {
                $detail = $product->details->first();
                $data[$detail->id] = [
                    'image' => $detail->image,
                    'name' => $detail->product->brand->name . ' ' . $detail->product->name,
                    'price' => $detail->product->price
                ];
            }
        }

        return view('home', ['categories' => $categories, 'products' => $data]);
    }
}
