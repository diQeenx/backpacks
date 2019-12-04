<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

abstract class UserBaseController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('user');
    }
}
