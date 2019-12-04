<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminController extends AdminBaseController
{
    public function index()
    {
        return view('admin');
    }
}
