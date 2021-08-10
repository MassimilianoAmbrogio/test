<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DateNight;

class ArraysController extends Controller
{
    public function index(){
        $array1 = [
            array([
                "name" => "Massimiliano",
                "slug" => "Ovest",
                "active" => "active",
            ]),
        ];
        // Stampa array1
        print_r($array1)."<br>";
        //aggiungere un elemento all'array
        $array1[] = ["name" => "Alessandro", "slug" => "Est", "active" => "notactive"];
        print_r($array1)."<br>";

        $array2 = [
            array([
                "data_inizio" => '13/08/2021',
                "numero_notti" => "Massimiliano",
                "data_fine" => "17/08/2021",
            ]),
        ];
        //aggiungere un elemento all'array
        $array2[] = ["data_fine" => count($array2[0][0])];
        dd($array2);

        $datenights = DateNight::all();
        return view('datenights', [
            'datenights' => $datenights,
        ]);
    }

    public function store(ClusterStoreRequest $request)
    {
        $data = $request->only('data_inizio', 'numero_notti', 'data_fine');

        try {
            DateNight::create($data);
        } catch (\Exception $e) {
            return redirect()->route('arrays')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('arrays')->with('success', 'Operazione completata con successo');
    }

    public function show($datenight_id)
    {
        $datenight = DateNight::find($datenight_id);
        return view("datenight", [
            "datenight" => $datenight,
        ]);
    }
}

