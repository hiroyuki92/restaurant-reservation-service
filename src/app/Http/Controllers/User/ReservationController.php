<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $reservationTime = $request->reservation_time . ' ' . $request->time;

        Reservation::create([
            'user_id' => Auth::id(),
            'restaurant_id' => $request->restaurant_id,
            'reservation_time' => $reservationTime,
            'number_of_people' => $request->number_of_people,
        ]);
        return redirect()->route('done');
    }

    public function complete()
    {
        return view('reservation_completed');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('mypage');
    }
}
