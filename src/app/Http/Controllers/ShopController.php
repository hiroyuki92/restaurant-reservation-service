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

    public function detail($shop_id)
    {
        $restaurant = Restaurant::with(['area', 'genre'])->findOrFail($shop_id);
        return view('restaurant_detail', compact('restaurant'));
    }
}
