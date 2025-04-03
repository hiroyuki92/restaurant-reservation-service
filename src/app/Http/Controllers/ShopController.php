<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class ShopController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['area', 'genre'])->get();
        return view('restaurant_list', compact('restaurants'));
    }

    public function detail()
    {
        return view('restaurant_detail');
    }
}
