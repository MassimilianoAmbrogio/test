<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\DateNight;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ArrController extends Controller
{
    public function index(){
        // Es. 1

        $array1[0] = [
            "name" => "Massimiliano",
            "active" => "1",
            "slug" => "ovest",
        ];

        // aggiunta nuovo elemento all'array
        $array1[1] = [
            "name" => "Alessandro",
            "active" => "1",
            "slug" => "est",
        ];
        //dd($array1);

        // Inserimento nel DB
        /*try {
            Cluster::insert($array1);
        } catch (\Exception $e) {
            dd('Qualcosa è andato storto:' . $e->getMessage());
        }*/

        // Es. 2
       $array2 = [
           "data_inizio" => "2021-08-16",
        ];
        // aggiunta nuovi elementi all'array
        $numero_notti = 5;
        $array2['numero_notti'] = $numero_notti;
        $data_inizio = Carbon::parse($array2['data_inizio'],'Europe/Rome');
        $num_nights = $array2['numero_notti'];
        $data_fine = $data_inizio->addDays($num_nights);
        $array2['data_fine'] = $data_fine->format('Y-m-d');
        $active = 1;
        $array2['active'] = $active;
        //dd($array2);

        try {
            DateNight::insert($array2);
        } catch (\Exception $e) {
            dd('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        dd("ok");
    }
}