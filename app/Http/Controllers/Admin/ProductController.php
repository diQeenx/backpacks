<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Color;
use App\Models\Product\Product;
use App\Models\Product\ProductDetails;
use App\Models\Product\Type;
use App\Http\Requests\Admin\ProductDetail as ProductDetailRequest;
use App\Http\Requests\Admin\Product as ProductRequest;

class ProductController extends AdminBaseController
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $types = Type::all();
        $products = Product::all();
        $colors = Color::all();
        return view('admin.forms.__products', ['products' => $products, 'categories' => $categories, 'brands' => $brands, 'types' => $types, 'colors' => $colors]);
    }

    public function add(ProductRequest $request)
    {
        $data = $request->except('_token');

        (new Product($data))->save();

        return back();
    }

    public function addDetail(ProductDetailRequest $request)
    {
        $data = $request->except('_token');

        $data['image'] = 'storage/' . $request->file('image')->store('products', 'public');

        if ($data['color_id'] === '0') {
            if ($data['color']) {
                Color::create(['name' => $data['color']]);
                $data['color_id'] = Color::where('name', $data['color']);
            }
        }

        (new ProductDetails($data))->save();

        return back();
    }

    public function delete($id)
    {
        if ($product = Product::find((int)$id)) {
            $product->delete();
        }

        return back();
    }
}
