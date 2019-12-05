<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        return view('home', compact('categories'));
    }
}
