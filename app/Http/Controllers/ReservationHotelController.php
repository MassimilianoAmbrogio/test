<?php

namespace App\Http\Controllers;

use App\ReservationHotel;
use App\Http\Requests\ReservationHotelStoreRequest;
use App\Http\Requests\ReservationHotelUpdateRequest;

use Illuminate\Http\Request;

class ReservationHotelController extends Controller
{
    public function index()
    {
        $reservation_hotels = ReservationHotel::all();
        return view('reservation_hotels', [
            'reservation_hotels' => $reservation_hotels,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ReservationHotelStoreRequest $request)
    {
        $data = $request->only( 'arrival_date', 'nights', 'num_pax', 'has_lunch', 'room_type', 'price');

        try {
            $data['departure_date'] = $request->input('departure_date');

            ReservationHotel::create($data);
        } catch (\Exception $e) {
            return redirect()->route('reservation_hotels')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('reservation_hotels')->with('success', 'Operazione completata con successo');
    }

    public function show($reservation_hotels_id)
    {
        $reservation_hotel = ReservationHotel::find($reservation_hotels_id);
        return view("reservation_hotel", [
            "reservation_hotel" => $reservation_hotel,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(ReservationHotelUpdateRequest $request, $reservation_hotels_id)
    {
        $data = $request->only('arrival_date', 'nights', 'num_pax', 'has_lunch', 'room_type', 'price');

        try {
            ReservationHotel::find($reservation_hotels_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('reservation_hotels')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('reservation_hotels')->with('success', 'Operazione completata con successo');
    }

    public function destroy($reservation_hotels_id)
    {
        $reservation_hotel = ReservationHotel::find($reservation_hotels_id);
        if (empty($reservation_hotel)) {
            return redirect()->route('reservation_hotels')->with('error', 'Reservation Hotel non esiste');
        }

        try {
            $reservation_hotel->delete();
        } catch (\Exception $e) {
            return redirect()->route('reservation_hotels')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('reservation_hotels')->with('success', 'Operazione completata con successo');
    }
}
