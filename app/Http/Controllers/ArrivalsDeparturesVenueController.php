<?php

namespace App\Http\Controllers;

use App\ArrivalsDeparturesVenue;
use App\Http\Requests\ArrivalsDeparturesVenueStoreRequest;
use App\Http\Requests\ArrivalsDeparturesVenueUpdateRequest;

use Illuminate\Http\Request;

class ArrivalsDeparturesVenueController extends Controller
{
    public function index()
    {
        $arrivals_departures_venues = ArrivalsDeparturesVenue::all();
        return view('arrivals_departures_venues', [
            'arrivals_departures_venues' => $arrivals_departures_venues,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ArrivalsDeparturesVenueStoreRequest $request)
    {
        $data = $request->only('name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            ArrivalsDeparturesVenue::create($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_venues')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('arrivals_departures_venues')->with('success', 'Operazione completata con successo');
    }

    public function show($arrivals_departures_venue_id)
    {
        $arrivals_departures_venue = ArrivalsDeparturesVenue::find($arrivals_departures_venue_id);

        return view("arrivals_departures_venue", [
            "arrivals_departures_venue" => $arrivals_departures_venue
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(ArrivalsDeparturesVenueUpdateRequest $request, $arrivals_departures_venue_id)
    {
        $data = $request->only('name', 'active');

        try {
            ArrivalsDeparturesVenue::find($arrivals_departures_venue_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_venues')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures_venues')->with('success', 'Operazione completata con successo');
    }

    public function destroy($arrivals_departures_venue_id)
    {
        $arrivals_departures_venue = ArrivalsDeparturesVenue::find($arrivals_departures_venue_id);

        try {
            $arrivals_departures_venue->delete();
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_venues')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures_venues')->with('success', 'Operazione completata con successo');
    }
}
