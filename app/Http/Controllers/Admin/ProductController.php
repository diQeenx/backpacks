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

        if ($data['type_id'] === '0') {
            if ($data['type']) {
                $type = Type::where('name', $data['type']);
                if ($type->count() === 0) {
                    Type::create(['name' => $data['type']]);
                    $data['type_id'] = (Type::where('name', $data['type'])->first())->id;
                } else {
                    $data['type_id'] = ($type->first())->id;
                }
            } else {
                return back();
            }
        }

        (new Product($data))->save();

        return back();
    }

    public function addDetail(ProductDetailRequest $request)
    {
        $data = $request->except('_token');

        $data['image'] = 'storage/' . $request->file('image')->store('products', 'public');

        if ($data['color_id'] === '0') {
            if ($data['color']) {
                if ((Color::where('name', $data['color'])->count() === 0)) {
                    Color::create(['name' => $data['color']]);
                    $data['color_id'] = (Color::where('name', $data['color'])->first())->id;
                } else {
                    return back();
                }
            } else {
                return back();
            }
        }

        $check = (ProductDetails::where([
            ['product_id', '=', $data['product_id']],
            ['color_id', '=', $data['color_id']]
        ]));

        if ($check->count() != 0) {
            $check->update([
               'product_id' => $data['product_id'],
               'color_id' => $data['color_id'],
               'count' => $data['count'],
               'image' => $data['image']
            ]);

            return back();
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

    public function info($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $types = Type::all();
        $product = Product::find($id);

        return view('admin.forms.__details', [
            'categories' => $categories,
            'brands' => $brands,
            'types' => $types,
            'product' => $product
        ]);
    }

    public function productUpdate(ProductRequest $request, $id)
    {
        $data = $request->except('_token');

        Product::find($id)->update($data);

        return back();
    }

    public function deleteDetail($id)
    {
        if ($detail = ProductDetails::find($id)) {
            $detail->delete();
        }

        return back();
    }
}
