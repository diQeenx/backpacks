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
        $data['image'] = 'storage/' . $request->file('img')->store('categories', 'public');
        $data['name'] = $request->name;

        (new Category($data))->save();

        return back();
    }

    public function delete($id)
    {
        if ($category = Category::find((int)$id)) {
            $category->delete();
        }

        return back();
    }
}
