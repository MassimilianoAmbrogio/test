<?php

namespace App\Http\Controllers;

use App\ArrivalsDeparturesMean;
use App\Http\Requests\ArrivalsDeparturesMeanStoreRequest;
use App\Http\Requests\ArrivalsDeparturesMeanUpdateRequest;

use Illuminate\Http\Request;

class ArrivalsDeparturesMeanController extends Controller
{
    public function index()
    {
        $arrivals_departures_means = ArrivalsDeparturesMean::all();
        return view('arrivals_departures_means', [
            'arrivals_departures_means' => $arrivals_departures_means,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ArrivalsDeparturesMeanStoreRequest $request)
    {
        $data = $request->only('name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            ArrivalsDeparturesMean::create($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_means')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('arrivals_departures_means')->with('success', 'Operazione completata con successo');
    }

    public function show($arrivals_departures_mean_id)
    {
        $arrivals_departures_mean = ArrivalsDeparturesMean::find($arrivals_departures_mean_id);

        return view("arrivals_departures_mean", [
            "arrivals_departures_mean" => $arrivals_departures_mean
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(ArrivalsDeparturesMeanUpdateRequest $request, $arrivals_departures_mean_id)
    {
        $data = $request->only('name', 'active');

        try {
            ArrivalsDeparturesMean::find($arrivals_departures_mean_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_means')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures_means')->with('success', 'Operazione completata con successo');
    }

    public function destroy($arrivals_departures_mean_id)
    {
        $arrivals_departures_mean = ArrivalsDeparturesMean::find($arrivals_departures_mean_id);

        try {
            $arrivals_departures_mean->delete();
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_means')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures_means')->with('success', 'Operazione completata con successo');
    }
}
