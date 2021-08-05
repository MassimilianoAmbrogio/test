<?php

namespace App\Http\Controllers;

use App\Accommodation;
use App\Room;
use App\Reservation;
use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;

use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        $accommodations = Accommodation::all();
        $rooms = Room::all();
        $reservations = Reservation::all();
        return view('reservations', [
            'reservations' => $reservations,
            'accommodations' => $accommodations,
            'rooms' => $rooms,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ReservationStoreRequest $request)
    {
        $data = $request->only('accommodation_id', 'room_id', 'arrival_date', 'nights', 'qty', 'active');

        $room = Room::find($data['room_id']);
        if ($data['qty'] > $room->qty) {
            return redirect()->route('reservations')->with('error', 'Non è possibile effetuare la prenotaziopne');
        }

        try {
            Reservation::create($data);

            $room->qty -= $data["qty"];
            $room->save();
        } catch (\Exception $e) {
            return redirect()->route('reservations')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('reservations')->with('success', 'Operazione completata con successo');
    }
    
    public function show($reservation_id)
    {
        $accommodations = Accommodation::all();
        $rooms = Room::all();
        $reservation = Reservation::find($reservation_id);
        return view("reservation", [
            "reservation" => $reservation,
            'accommodations' => $accommodations,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(ReservationUpdateRequest $request, $reservation_id)
    {
        $data = $request->only('accommodation_id', 'room_id', 'arrival_date', 'nights', 'qty', 'active');

        $room = Room::find($data['room_id']);
        if ($data['qty'] > $room->qty) {
            return redirect()->route('reservations')->with('error', 'Non è possibile effetuare la prenotazione');
        }

        try {
            Reservation::find($reservation_id)->update($data);

            $room->qty -= $data["qty"];
            $room->save();
        } catch (\Exception $e) {
            return redirect()->route('reservations')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('reservations')->with('success', 'Operazione completata con successo');
    }


    public function destroy($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        if (empty($reservation)) {
            return redirect()->route('reservations')->with('error', 'Hotel non esiste');
        }

        $room = Room::find($reservation->room_id);

        try {
            $room->qty += $reservation->qty;
            $room->save();

            $reservation->delete();

        } catch (\Exception $e) {
            return redirect()->route('reservations')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('reservations')->with('success', 'Operazione completata con successo');
    }
}
