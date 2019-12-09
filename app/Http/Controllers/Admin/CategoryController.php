<?php


namespace App\Http\Controllers\Admin;


use App\Models\Product\Category;
use Illuminate\Http\Request;

class CategoryController extends AdminBaseController
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.forms.__categories', compact('categories'));
    }

    public function add(Request $request)
    {
        $path = $request->file('img');

        var_dump($path);
        exit;
    }

    public function delete($id)
    {
        if ($category = Category::find((int)$id)) {
            $category->delete();
        }

        return back();
    }
}
