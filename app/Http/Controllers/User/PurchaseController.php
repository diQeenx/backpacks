<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends UserBaseController
{
    public function index()
    {
        $user = auth()->user();
        $sales = $user->sales()->orderBy('created_at', 'DESC')->paginate(10);

        return view('user.forms.__purchase', compact('sales'));
    }
}
