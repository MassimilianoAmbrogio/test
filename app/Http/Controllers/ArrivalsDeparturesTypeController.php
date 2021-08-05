<?php

namespace App\Http\Controllers;

use App\ArrivalsDeparturesType;
use App\Http\Requests\ArrivalsDeparturesTypeStoreRequest;
use App\Http\Requests\ArrivalsDeparturesTypeUpdateRequest;

use Illuminate\Http\Request;

class ArrivalsDeparturesTypeController extends Controller
{
    public function index()
    {
        $arrivals_departures_types = ArrivalsDeparturesType::all();
        return view('arrivals_departures_types', [
            'arrivals_departures_types' => $arrivals_departures_types,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(ArrivalsDeparturesTypeStoreRequest $request)
    {
        $data = $request->only('name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            ArrivalsDeparturesType::create($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_types')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('arrivals_departures_types')->with('success', 'Operazione completata con successo');
    }

    public function show($arrivals_departures_type_id)
    {
        $arrivals_departures_type = ArrivalsDeparturesType::find($arrivals_departures_type_id);

        return view("arrivals_departures_type", [
            "arrivals_departures_type" => $arrivals_departures_type
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(ArrivalsDeparturesTypeUpdateRequest $request, $arrivals_departures_type_id)
    {
        $data = $request->only('name', 'active');

        try {
            ArrivalsDeparturesType::find($arrivals_departures_type_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_types')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures_types')->with('success', 'Operazione completata con successo');
    }

    public function destroy($arrivals_departures_type_id)
    {
        $arrivals_departures_type = ArrivalsDeparturesType::find($arrivals_departures_type_id);

        try {
            $arrivals_departures_type->delete();
        } catch (\Exception $e) {
            return redirect()->route('arrivals_departures_types')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('arrivals_departures_types')->with('success', 'Operazione completata con successo');
    }
}