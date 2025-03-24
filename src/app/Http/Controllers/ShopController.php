<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('restaurant_list');
    }

    public function detail()
    {
        return view('restaurant_detail');
    }
}
