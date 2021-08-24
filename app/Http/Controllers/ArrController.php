<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrController extends Controller
{
    public function index(){
        $array1 = [
            array([
                "last_name" => "Ambrogio",
                "name" => "Massimiliano",
                "slug" => "Ovest",
                "active" => "active",
                "age" => "21",
                "city" => "Turin",
            ]),
        ];
        //aggiungere un elemento all'array
        $array1[] = ["name" => "Alessandro", "slug" => "Est", "active" => "notactive"];
        print_r($array1)."<br>";
        //dd($array1);

        $array2 = [
            array([
                "data_inizio" => '13/08/2021',
                "numero_notti" => "4",
                "data_fine" => "17/08/2021",
            ]),
        ];
        //aggiungere un elemento all'array (attributo data_fine calcolato come data_inizio + numero_notti)
        $array2[] = ["data_fine" => count(array("data_inizio", "numero_notti"))];
        //dd($array2);

        $array3 = [
            array([
                "driver_name" => 'Matteo',
                "driver_id" => '2',
                "brand" => '578',
                "model" => "500",
                "active" => "notactive",
                "age" => '35',
                "displacement" => '1100',
            ]),
        ];
        dd($array3);
    }
}