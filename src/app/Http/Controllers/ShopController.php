<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Favorite;

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

    public function toggleFavorite(Request $request, $restaurantId)
    {
        $user = auth()->user();

        $favorite = Favorite::where('user_id', $user->id)
            ->where('restaurant_id', $restaurantId)
            ->first();

        if ($favorite) {
            // すでに「いいね」していれば、削除
            $favorite->delete();
            $favorited = false;
        } else {
            // 「いいね」していなければ、新たに「いいね」追加
            Favorite::create([
                'user_id' => $user->id,
                'restaurant_id' => $restaurantId,
            ]);
            $favorited = true;
        }

        return response()->json(['favorited' => $favorited]);
    }
}
