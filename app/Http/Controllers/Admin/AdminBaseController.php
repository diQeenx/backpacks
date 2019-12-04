<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

abstract class AdminBaseController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin');
    }
}
