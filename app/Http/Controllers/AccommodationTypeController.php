<?php

namespace App\Http\Controllers;

use App\AccommodationType;
use App\Http\Requests\AccommodationTypeStoreRequest;
use App\Http\Requests\AccommodationTypeUpdateRequest;

use Illuminate\Http\Request;

class AccommodationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accommodation_types = AccommodationType::all();
        return view('accommodation_types', [
            'accommodation_types' => $accommodation_types,
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
     * @param  \Illuminate\Http\AccommodationTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccommodationTypeStoreRequest $request)
    {
        $data = $request->only( 'name', 'active');

        $data["slug"] = str_slug($data["name"]);

        try {
            AccommodationType::create($data);
        } catch (\Exception $e) {
            return redirect()->route('accommodation_types')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('accommodation_types')->with('success', 'Operazione completata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $accommodation_type_id
     * @return \Illuminate\Http\Response
     */
    public function show($accommodation_type_id)
    {
        $accommodation_type = AccommodationType::find($accommodation_type_id);

        return view("accommodation_type", [
            "accommodation_type" => $accommodation_type
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AccommodationTypeUpdateRequest $request
     * @param  int  $accommodation_type_id
     * @return \Illuminate\Http\Response
     */
    public function update(AccommodationTypeUpdateRequest $request, $accommodation_type_id)
    {
        $data = $request->only('name', 'active');

        try {
            AccommodationType::find($accommodation_type_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('accommodation_types')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('accommodation_types')->with('success', 'Operazione completata con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $accommodation_type_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($accommodation_type_id)
    {
        $accommodation_type = AccommodationType::find($accommodation_type_id);
        if (empty($accommodation_type)) {
            return redirect()->route('accommodation_types')->with('error', 'Hotel non esiste');
        }

        try {
            $accommodation_type->delete();
        } catch (\Exception $e) {
            return redirect()->route('accommodation_types')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('accommodation_types')->with('success', 'Operazione completata con successo');
    }
}
