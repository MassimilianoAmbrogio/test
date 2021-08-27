<?php

namespace App\Http\Controllers;

use App\Driver;
use App\User;
use App\Http\Requests\DriverStoreRequest;
use App\Http\Requests\DriverUpdateRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $users = User::all();
        $drivers = Driver::all();
        return view('drivers', [
            'drivers' => $drivers,
            'users' => $users,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(DriverStoreRequest $request)
    {
        $data = $request->only( 'user_id', 'age', 'driver', 'active');

        try {
            $driver = Driver::create($data);

            if ($request->file('document_type')){
                $file = $request->file('document_type');
                $filename = $file->getClientOriginalName();
                $disk = Storage::disk('public');
                $directory = "drivers";
                $disk->putFileAs($directory, $file, $filename);
                $url = $disk->url($directory."/".$filename);
                $url = str_replace('http://localhost', 'http://127.0.0.1:8000', $url);
                $driver->document_type = $url;
                $driver->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('drivers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('drivers')->with('success', 'Operazione completata con successo');
    }

    public function show($driver_id)
    {
        $users = User::all();
        $driver = Driver::find($driver_id);
        return view("driver", [
            "driver" => $driver,
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(DriverUpdateRequest $request, $driver_id)
    {
        $data = $request->only('user_id', 'age', 'driver', 'active');

        try {
            $driver = Driver::find($driver_id);

            $driver->update($data);

            if ($request->file('document_type')){
                $file = $request->file('document_type');
                $filename = $file->getClientOriginalName();
                $disk = Storage::disk('public');
                $directory = "drivers";
                $disk->putFileAs($directory, $file, $filename);
                $url = $disk->url($directory."/".$filename);
                $url = str_replace('http://localhost', 'http://127.0.0.1:8000', $url);
                $driver->document_type = $url;
                $driver->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('drivers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('drivers')->with('success', 'Operazione completata con successo');
    }

    public function destroy($driver_id)
    {
        $driver = Driver::find($driver_id);
        if (empty($driver)) {
            return redirect()->route('drivers')->with('error', 'Driver non esiste');
        }

        try {
            $driver->delete();
        } catch (\Exception $e) {
            return redirect()->route('drivers')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('drivers')->with('success', 'Operazione completata con successo');
    }
}