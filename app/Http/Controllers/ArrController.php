<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
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
        //dd("ok");

        // Es. 2
       $array2 = [
           "data_inizio" => "2021-08-16",
        ];
        //dd($array2);

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

        // Inserimento nel DB
        /*try {
            DateNight::insert($array2);
        } catch (\Exception $e) {
            dd('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }*/
        //dd("ok");

        // Es. 3
        //inserire veicolo
        $vehicle = [
            "driver_id" => null,
            "brand" => "34",
            "model" => "Punto",
            "active" => "1",
        ];
        //dd($vehicle);

        //inserire driver
        $driver = [
            "user_id" => "2",
            "age" => "34",
            "document_type" => "PDF",
            "active" => "1",
        ];
        //dd($driver);

        //creare driver
        /*try {
            $new_driver = Driver::create($driver);
        } catch (\Exception $e) {
            dd('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }*/

        //sostituire driver_id
        $vehicle = [
            "driver_id" => $new_driver->id,
            "brand" => "34",
            "model" => "Punto",
            "active" => "1",
        ];
        //dd($vehicle);

        //inserimento driver creato nella tabella vehicles
        /*try {
            Vehicle::insert($vehicle);
        } catch (\Exception $e) {
            dd('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }*/
        dd("ok");
    }
}