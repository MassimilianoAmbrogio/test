<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArraysController extends Controller
{
    public function index(){
        $array1 = [
            array([
                "num_id" => '3',
                "name" => "Massimiliano",
                "slug" => "Ovest",
                "active" => "active",
                "date_create" => '9/08/2021',
                "date_update" => '9/08/2021',
            ]),
        ];
        // Stampa array1
        print_r($array1)."<br>";
        //aggiungere un elemento all'array
        $array1[] = ["num_id" => "4", "name" => "Alessandro", "slug" => "Est", "active" => "notactive", "date_create" => "10/08/2021", "date_update" => "10/08/2021"];
        print_r($array1)."<br>";
        dd($array1);
    }
}

