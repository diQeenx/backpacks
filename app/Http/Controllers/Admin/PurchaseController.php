<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('created_at', 'DESC')->paginate(8);

        return view('admin.forms.__sales', compact('sales'));
    }

    public function info($id)
    {
        if ((int)$id === 0) {
            return back();
        }

        $sale = Sale::find($id);

        return view('admin.forms.__sale_info', compact('sale'));
    }

    public function saleByUser($id)
    {
        if ((int)$id === 0) {
            return back();
        }

        $sales = Sale::where('user_id', $id)->paginate(8);

        return view('admin.forms.__sales', compact('sales'));
    }
}
