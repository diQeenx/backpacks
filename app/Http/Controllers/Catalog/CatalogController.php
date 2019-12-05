<?php

namespace App\Http\Controllers\Catalog;

use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $types = Type::all();
        $brands = Brand::all();
        $products = Product::paginate(9);
        $fullProduct = [];

        foreach ($products as $product) {
            $detail = $product->details()->first();
            $fullProduct[] = [
                'id' => $product->id,
                'category' => $product->category->name,
                'brand' => $product->brand->name,
                'type' => $product->type->name,
                'name' => $product->name,
                'price' => $product->price,
                'size' => $product->size,
                'description' => $product->description,
                'detail_id' => $detail->id,
                'image' => $detail->image,
            ];
        }

        $data = [
            'categories' => $categories,
            'types' => $types,
            'brands' => $brands,
            'products' => $fullProduct,
            'paginate' => $products
        ];

        return view('catalog.index', compact('data'));
    }
}
