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
    private $categories = [];
    private $types = [];
    private $brands = [];
    private $products = [];
    private $data = [];

    public function __construct()
    {
        $this->categories = Category::all();
        $this->types = Type::all();
        $this->brands = Brand::all();
        $this->products = Product::paginate(9);

        $this->data = [
            'categories' => $this->categories,
            'types' => $this->types,
            'brands' => $this->brands,
            'paginate' => $this->products
        ];
    }

    public function index()
    {
        $fullProduct = [];

        foreach ($this->products as $product) {
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

        $this->data['products'] = $fullProduct;
        $data = $this->data;

        return view('catalog.products.product_list', compact('data'));
    }

    public function sort($field)
    {

    }
}
