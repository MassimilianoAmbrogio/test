<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTimeZone;

use Illuminate\Http\Request;

class DateController extends Controller
{
    public function index() {
        $date1 = "2021-01-01 12:50:00";
        $date2 = "2021-07-31 14:30:00";

        //trasformazione in oggetto carbon
        $date1_parsed = Carbon::parse($date1,'Europe/Rome');
        $date2_parsed = Carbon::parse($date2,'Europe/Rome');

        //formattazione data
        print $date1_parsed->format('j/F/y H:i A')."<br>";
        print $date2_parsed->format('d/n/Y')."<br>";

        //differenza in giorni
        $diffInDays = $date1_parsed->diffInDays($date2_parsed);
        print "differenza in giorni: ".$diffInDays."<br>";

        //differenza in mesi
        $diffInMonths = $date1_parsed->diffInMonths($date2_parsed);
        print "differenza in mesi: ".$diffInMonths."<br>";

        //giorno della settimana date1, date2
        print $date1_parsed->format('l j/m/Y')."<br>";
        print $date2_parsed->format('l d/m/Y A')."<br>";

        //orario a los angeles date2
        $date2_parsed->tz = new DateTimeZone('America/Los_Angeles');
        print $date2_parsed->format('j/m/Y H:i A')."<br>";

        //stabilire qual è la data piu grande
        $date1 = "2021-01-01 12:50:00";
        $date2 = "2021-07-31 14:30:00";

        $date1_parsed = Carbon::parse($date1,'Europe/Rome');
        $date2_parsed = Carbon::parse($date2,'Europe/Rome');

        print "bool: ".$date1_parsed->lessThan($date2_parsed);
    }
}
