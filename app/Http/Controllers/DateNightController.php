<?php

namespace App\Http\Controllers;

use App\DateNight;
use App\Http\Requests\DateNightStoreRequest;

use Illuminate\Http\Request;

class DateNightController extends Controller
{
    public function index()
    {
        $datenights = DateNight::all();
        return view('datenights', [
            'datenights' => $datenights,
        ]);
    }

    public function store(DateNightStoreRequest $request)
    {
        $data = $request->only('data_inizio', 'numero_notti', 'data_fine', 'active');

        try {
            DateNight::create($data);
        } catch (\Exception $e) {
            return redirect()->route('datenights')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('datenights')->with('success', 'Operazione completata con successo');
    }
}
