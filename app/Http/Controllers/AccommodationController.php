<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\AccommodationTreatment;
use App\User;
use App\AccommodationType;
use App\Accommodation;
use App\Http\Requests\AccommodationStoreRequest;
use App\Http\Requests\AccommodationUpdateRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AccommodationController extends Controller
{

    public function index()
    {
        $clusters = Cluster::where('active', 1)->get();
        $accommodation_treatments = AccommodationTreatment::where('active', 1)->get();
        $users = User::all();
        $accommodation_types = AccommodationType::all();
        $accommodations = Accommodation::all();
        return view('accommodations', [
            'accommodations' => $accommodations,
            'accommodation_types' => $accommodation_types,
            'users' => $users,
            'accommodation_treatments' => $accommodation_treatments,
            'clusters' => $clusters,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(AccommodationStoreRequest $request)
    {
        $data = $request->only( 'name', 'description', 'address', 'post_code', 'city', 'phone', 'accommodation_type_id', 'user_id', 'accommodation_treatment_id', 'cluster_id', 'checkin_date', 'nights', 'active');

        try {
            $checkin_date = Carbon::parse($data['checkin_date'],'Europe/Rome');
            $nights = $data['nights'];
            $checkout_date = $checkin_date->addDays($nights);
            $data['checkout_date'] = $checkout_date->format('Y-m-d');

            Accommodation::create($data);
        } catch (\Exception $e) {
            return redirect()->route('accommodations')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('accommodations')->with('success', 'Operazione completata con successo');
    }

    public function show($accommodation_id)
    {
        $clusters = Cluster::all();
        $accommodation_treatments = AccommodationTreatment::all();
        $users = User::all();
        $accommodation_types = AccommodationType::all();
        $accommodation = Accommodation::find($accommodation_id);
        return view("accommodation", [
            "accommodation" => $accommodation,
            'accommodation_types' => $accommodation_types,
            'users' => $users,
            'accommodation_treatments' => $accommodation_treatments,
            'clusters' => $clusters,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(AccommodationUpdateRequest $request, $accommodation_id)
    {
        $data = $request->only('name', 'description', 'address', 'post_code', 'city', 'phone', 'accommodation_type_id', 'user_id', 'accommodation_treatment_id', 'cluster_id', 'checkin_date', 'nights', 'active');

        try {
            $checkin_date = Carbon::parse($data['checkin_date'],'Europe/Rome');
            $nights = $data['nights'];
            $checkout_date = $checkin_date->addDays($nights);
            $data['checkout_date'] = $checkout_date->format('Y-m-d');

            Accommodation::find($accommodation_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('accommodations')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('accommodations')->with('success', 'Operazione completata con successo');
    }

    public function destroy($accommodation_id)
    {
        $accommodation = Accommodation::find($accommodation_id);
        if (empty($accommodation)) {
            return redirect()->route('accommodations')->with('error', 'Hotel non esiste');
        }

        try {
            $accommodation->delete();
        } catch (\Exception $e) {
            return redirect()->route('accommodations')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('accommodations')->with('success', 'Operazione completata con successo');
    }
}
