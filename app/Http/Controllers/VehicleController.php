<?php

namespace App\Http\Controllers;

use App\ArrVehicle;
use App\Vehicle;
use App\Driver;
use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $drivers = Driver::where('active', 1)->get();
        $vehicles = Vehicle::all();
        $arrays = ArrVehicle::all();
        return view('vehicles', [
            'vehicles' => $vehicles,
            'drivers' => $drivers,
            'arrays' => $arrays,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(VehicleStoreRequest $request)
    {
        $data = $request->only( 'driver_name', 'driver_id', 'brand', 'model', 'active', 'age', 'displacement');

        try {
            ArrVehicle::create($data);
            Vehicle::create($data);
        } catch (\Exception $e) {
            return redirect()->route('vehicles')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('vehicles')->with('success', 'Operazione completata con successo');
    }

    public function show($vehicle_id)
    {
        $drivers = Driver::all();
        $vehicle = Vehicle::find($vehicle_id);
        return view("vehicle", [
            "vehicle" => $vehicle,
            'drivers' => $drivers,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(VehicleUpdateRequest $request, $vehicle_id)
    {
        $data = $request->only('driver_id', 'brand', 'model', 'active');

        try {
            Vehicle::find($vehicle_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('vehicles')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('vehicles')->with('success', 'Operazione completata con successo');
    }

    public function destroy($vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);
        if (empty($vehicle)) {
            return redirect()->route('vehicles')->with('error', 'Driver non esiste');
        }

        try {
            $vehicle->delete();
        } catch (\Exception $e) {
            return redirect()->route('vehicles')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('vehicles')->with('success', 'Operazione completata con successo');
    }
}
