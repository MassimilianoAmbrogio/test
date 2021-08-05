<?php

namespace App\Http\Controllers;

use App\Accommodation;
use App\AccommodationTreatment;
use App\Http\Requests\AccommodationTreatmentStoreRequest;
use App\Http\Requests\AccommodationTreatmentUpdateRequest;

use Illuminate\Http\Request;

class AccommodationTreatmentController extends Controller
{
    public function index()
    {
        $accommodation_treatments = AccommodationTreatment::all();
        return view('accommodation_treatments', [
            'accommodation_treatments' => $accommodation_treatments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RoomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccommodationTreatmentStoreRequest $request)
    {
        $data = $request->only( 'name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            AccommodationTreatment::create($data);
        } catch (\Exception $e) {
            return redirect()->route('accommodation_treatments')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('accommodation_treatments')->with('success', 'Operazione completata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $accommodation_treatments_id
     * @return \Illuminate\Http\Response
     */
    public function show($accommodation_treatments_id)
    {
        $accommodation_treatment = AccommodationTreatment::find($accommodation_treatments_id);
        return view("accommodation_treatment", [
            "accommodation_treatment" => $accommodation_treatment,
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

    public function update(AccommodationTreatmentUpdateRequest $request, $accommodation_treatment_id)
    {
        $data = $request->only('name', 'active');

        try {
            AccommodationTreatment::find($accommodation_treatment_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('accommodation_treatments')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('accommodation_treatments')->with('success', 'Operazione completata con successo');
    }

    public function destroy($accommodation_treatment_id)
    {
        $accommodation_treatment = AccommodationTreatment::find($accommodation_treatment_id);
        if (empty($accommodation_treatment)) {
            return redirect()->route('accommodation_treatments')->with('error', 'Accommodation Treatment non esiste');
        }

        $accommodation = Accommodation::where('accommodation_treatment_id', $accommodation_treatment_id)->count();
        if ($accommodation) {
            return redirect()->route('accommodation_treatments')->with('error', 'Non è possibile cancellare la riga perchè il Name è inserito in una accommodation');
        }

        try {
            $accommodation_treatment->delete();
        } catch (\Exception $e) {
            return redirect()->route('accommodation_treatments')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('accommodation_treatments')->with('success', 'Operazione completata con successo');
    }
}
