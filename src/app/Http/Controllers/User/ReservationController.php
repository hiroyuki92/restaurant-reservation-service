<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $reservationTime = $request->reservation_date . ' ' . $request->time;

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

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->date = \Carbon\Carbon::parse($reservation->reservation_time)->format('Y-m-d');
        $reservation->time = \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i');
    
        return view('reservation_edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservationTime = $request->reservation_date . ' ' . $request->time;

        $reservation->update([
            'restaurant_id' => $request->restaurant_id,
            'reservation_time' => $reservationTime,
            'number_of_people' => $request->number_of_people,
        ]);

        return redirect()->route('mypage');
    }
}
