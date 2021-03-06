<?php

namespace App\Http\Controllers;

use App\FormData;
use App\Http\Requests\FormDataStoreRequest;
use App\Http\Requests\FormDataUpdateRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function index()
    {
        $form_datas = FormData::all();
        return view('form_datas', [
            'form_datas' => $form_datas,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(FormDataStoreRequest $request)
    {
        $data = $request->only('first_name', 'last_name', 'number_flight_arrival', 'airline_arrival', 'departure_city', 'arrival_date', 'arrival_hour', 'number_flight_departure', 'airline_departure', 'arrival_city', 'departure_date', 'departure_hour', 'passport_number', 'passport_expiry_date', 'tipology_room', 'special_request', 'active');

        try {
            $data['hotel'] = $request->input('flexRadioDefault');

            $form_data = FormData::create($data);

            if ($request->file('passport_img')){
                $file = $request->file('passport_img');
                $filename = $file->getClientOriginalName();
                $disk = Storage::disk('public');
                $directory = "form_datas";
                $disk->putFileAs($directory, $file, $filename);
                $url = $disk->url($directory."/".$filename);
                $url = str_replace('http://localhost', 'http://127.0.0.1:8000', $url);
                $form_data->passport_img = $url;
                $form_data->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('form_datas')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('form_datas')->with('success', 'Operazione completata con successo');
    }

    public function show($form_data_id)
    {
        $form_data = FormData::find($form_data_id);

        return view("form_data", [
            "form_data" => $form_data,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(FormDataUpdateRequest $request, $form_data_id)
    {
        $data = $request->only('first_name', 'last_name', 'number_flight_arrival', 'airline_arrival', 'departure_city', 'arrival_date', 'arrival_hour', 'number_flight_departure', 'airline_departure', 'arrival_city', 'departure_date', 'departure_hour', 'passport_number', 'passport_expiry_date', 'tipology_room', 'special_request', 'active');

        try {
            $form_data = FormData::find($form_data_id);

            $form_data->update($data);

            if ($request->file('passport_img')){
                $file = $request->file('passport_img');
                $filename = $file->getClientOriginalName();
                $disk = Storage::disk('public');
                $directory = "form_datas";
                $disk->putFileAs($directory, $file, $filename);
                $url = $disk->url($directory."/".$filename);
                $url = str_replace('http://localhost', 'http://127.0.0.1:8000', $url);
                $form_data->passport_img = $url;
                $form_data->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('form_datas')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('form_datas')->with('success', 'Operazione completata con successo');
    }

    public function destroy($form_data_id)
    {
        $form_data = FormData::find($form_data_id);
        if (empty($form_data)) {
            return redirect()->route('form_datas')->with('error', 'FormData non esiste');
        }

        try {
            $form_data->delete();
        } catch (\Exception $e) {
            return redirect()->route('form_datas')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('form_datas')->with('success', 'Operazione completata con successo');
    }

    public function show_arrival($form_data_id)
    {
        $form_data = FormData::find($form_data_id);

        $arrivals = FormData::where('active', 1)->get();

        return view("arrival", [
            "form_data" => $form_data,
            "arrivals" => $arrivals,
        ]);
    }

    public function update_arrival(Request $request, $form_data_id)
    {
        $data = $request->only( 'number_flight_arrival', 'airline_arrival', 'departure_city', 'arrival_date', 'arrival_hour');

        try {
            $form_data = FormData::find($form_data_id);

            $form_data->update($data);

        } catch (\Exception $e) {
            return redirect()->route('form_datas')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('form_datas')->with('success', 'Operazione completata con successo');
    }

    public function show_departure($form_data_id)
    {
        $form_data = FormData::find($form_data_id);

        $departures = FormData::where('active', 1)->get();

        return view("departure", [
            "form_data" => $form_data,
            "departures" => $departures,
        ]);
    }

    public function update_departure(Request $request, $form_data_id)
    {
        $data = $request->only( 'number_flight_departure', 'airline_departure', 'arrival_city', 'departure_date', 'departure_hour');

        try {
            $form_data = FormData::find($form_data_id);

            $form_data->update($data);

        } catch (\Exception $e) {
            return redirect()->route('form_datas')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('form_datas')->with('success', 'Operazione completata con successo');
    }

    public function show_passport($form_data_id)
    {
        $form_data = FormData::find($form_data_id);

        $passports = FormData::where('active', 1)->get();

        return view("passport", [
            "form_data" => $form_data,
            "passports" => $passports,
        ]);
    }

    public function update_passport(Request $request, $form_data_id)
    {
        $data = $request->only( 'passport_number', 'passport_expiry_date');

        try {
            $form_data = FormData::find($form_data_id);

            $form_data->update($data);

            if ($request->file('passport_img')){
                $file = $request->file('passport_img');
                $filename = $file->getClientOriginalName();
                $disk = Storage::disk('public');
                $directory = "form_datas";
                $disk->putFileAs($directory, $file, $filename);
                $url = $disk->url($directory."/".$filename);
                $url = str_replace('http://localhost', 'http://127.0.0.1:8000', $url);
                $form_data->passport_img = $url;
                $form_data->save();
            }

        } catch (\Exception $e) {
            return redirect()->route('form_datas')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('form_datas')->with('success', 'Operazione completata con successo');
    }

    public function show_hotel($form_data_id)
    {
        $form_data = FormData::find($form_data_id);

        $hotels = FormData::where('active', 1)->get();

        return view("hotel", [
            "form_data" => $form_data,
            "hotels" => $hotels,
        ]);
    }

    public function update_hotel(Request $request, $form_data_id)
    {
        $data = $request->only( 'tipology_room');

        try {
            $form_data = FormData::find($form_data_id);

            $data['hotel'] = $request->input('flexRadioDefault');

            $form_data->update($data);

        } catch (\Exception $e) {
            return redirect()->route('form_datas')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('form_datas')->with('success', 'Operazione completata con successo');
    }
}
