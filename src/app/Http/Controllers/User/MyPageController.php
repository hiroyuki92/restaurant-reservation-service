<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['restaurant'])
            ->where('user_id', auth()->id())
            ->get();

        foreach ($reservations as $reservation) {
            $reservation->date = \Carbon\Carbon::parse($reservation->reservation_time)->format('Y-m-d');
            $reservation->time = \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i');
        }

        $user = auth()->user();
        $favorites = $user->favorites()->with(['area', 'genre'])->get();

        $restaurants = Restaurant::all();
        return view('mypage', compact('user', 'reservations', 'restaurants', 'favorites'));
    }

}
