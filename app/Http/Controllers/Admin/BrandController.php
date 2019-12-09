<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends AdminBaseController
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.forms.__brands', compact('brands'));
    }

    public function add(Request $request)
    {
        $data['image'] = 'storage/' . $request->file('img')->store('brands', 'public');
        $data['name'] = $request->name;

        (new Brand($data))->save();

        return back();
    }

    public function delete($id)
    {
        if ($brand = Brand::find((int)$id)) {
            $brand->delete();
        }

        return back();
    }
}
