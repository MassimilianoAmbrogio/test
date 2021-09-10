<?php

namespace App\Http\Controllers;

use App\ReservationHotel;
use App\Http\Requests\ReservationHotelStoreRequest;
use App\Http\Requests\ReservationHotelUpdateRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReservationHotelController extends Controller
{
    public function index()
    {
        $reservation_hotels = ReservationHotel::all();
        return view('reservation_hotels', [
            'ronaldo' => $reservation_hotels,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ReservationHotelStoreRequest $request)
    {
        $data = $request->only( 'arrival_date', 'num_pax', 'room_type', 'price');

        try {
            $departure_date = $request->input('departure_date');
            $data['has_lunch'] = $request->input('has_lunch');

            $arrival_date = Carbon::parse($data['arrival_date'],'Europe/Rome');
            $data['nights'] = $arrival_date->diffInDays($departure_date);

            if($data['has_lunch'] == "") {
                $data['has_lunch'] = 5;
            } else {
                $data['has_lunch'] = 9;
            }

            ReservationHotel::create($data);
        } catch (\Exception $e) {
            return redirect()->route('reservation_hotels')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('reservation_hotels')->with('success', 'Operazione completata con successo');
    }

    public function show($reservation_hotel_id)
    {
        $reservation_hotel = ReservationHotel::find($reservation_hotel_id);
        return view("reservation_hotel", [
            "reservation_hotel" => $reservation_hotel,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(ReservationHotelUpdateRequest $request, $reservation_hotel_id)
    {
        $data = $request->only('arrival_date', 'num_pax', 'room_type', 'price');

        try {
            $data['has_lunch'] = $request->input('has_lunch');

            if($data['has_lunch'] == "") {
                $data['has_lunch'] = 5;
            } else {
                $data['has_lunch'] = 9;
            }

            $reservation_hotel = ReservationHotel::find($reservation_hotel_id);

            $reservation_hotel->update($data);
        } catch (\Exception $e) {
            return redirect()->route('reservation_hotels')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('reservation_hotels')->with('success', 'Operazione completata con successo');
    }

    public function destroy($reservation_hotel_id)
    {
        $reservation_hotel = ReservationHotel::find($reservation_hotel_id);
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
