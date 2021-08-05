<?php

namespace App\Http\Controllers;

use App\ArrivalsDeparture;
use App\User;
use App\ArrivalsDeparturesType;
use App\ArrivalsDeparturesMean;
use App\ArrivalsDeparturesVenue;
use App\Http\Requests\ArrivalsDepartureStoreRequest;
use App\Http\Requests\ArrivalsDepartureUpdateRequest;

use Illuminate\Http\Request;

class ArrivalsDepartureController extends Controller
{
    public function index()
    {
        $arrivals_departures = ArrivalsDeparture::all();
        $users = User::all();
        $arrivals_departures_types = ArrivalsDeparturesType::all();
        $arrivals_departures_means = ArrivalsDeparturesMean::all();
        $arrivals_departures_venues = ArrivalsDeparturesVenue::all();
        return view('arrivals_departures', [
            'arrivals_departures' => $arrivals_departures,
            'users' => $users,
            'arrivals_departures_types' => $arrivals_departures_types,
            'arrivals_departures_means' => $arrivals_departures_means,
            'arrivals_departures_venues' => $arrivals_departures_venues,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ArrivalsDepartureStoreRequest $request)
    {
        $data = $request->only( 'user_id', 'arrival_departure_id', 'transport_id', 'date_arrival_departure', 'hour_arrival_departure', 'place_arrival_departure_id', 'active');

        try {
            ArrivalsDeparture::create($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('arrivals_departures')->with('success', 'Operazione completata con successo');
    }

    public function show($arrivals_departure_id)
    {
        $arrivals_departure = ArrivalsDeparture::find($arrivals_departure_id);
        $users = User::all();
        $arrivals_departures_types = ArrivalsDeparturesType::all();
        $arrivals_departures_means = ArrivalsDeparturesMean::all();
        $arrivals_departures_venues = ArrivalsDeparturesVenue::all();
        return view("arrivals_departure", [
            "arrivals_departure" => $arrivals_departure,
            'users' => $users,
            'arrivals_departures_types' => $arrivals_departures_types,
            'arrivals_departures_means' => $arrivals_departures_means,
            'arrivals_departures_venues' => $arrivals_departures_venues,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(ArrivalsDepartureUpdateRequest $request, $arrivals_departure_id)
    {
        $data = $request->only('user_id', 'arrival_departure_id', 'transport_id', 'date_arrival_departure', 'hour_arrival_departure', 'place_arrival_departure_id', 'active');

        try {
            ArrivalsDeparture::find($arrivals_departure_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures')->with('success', 'Operazione completata con successo');
    }

    public function destroy($arrivals_departure_id)
    {
        $arrivals_departure = ArrivalsDeparture::find($arrivals_departure_id);

        try {
            $arrivals_departure->delete();
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures')->with('success', 'Operazione completata con successo');
    }
}
