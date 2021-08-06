<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function index(){
        $array1 = ["giallo","rosso","verde"];

        //contare gli elementi dell'array
        $element1 = count($array1);
        print $element1."<br>";
        //aggiungere un elemento all'array
        $array1[] = "blu";
        print_r($array1)."<br>";
        //contare gli elementi dell'array
        $element2 = count($array1);
        print $element2."<br>";
        //eliminare elemento rosso
        unset($array1[1]);
        print_r($array1)."<br>";
        //contare gli elementi dell'array
        $element3 = count($array1);
        print $element3."<br>";

        $array2 = [
            "nome" => "Pippo",
            "cognome" => "Pluto",
            "eta" => "25",
        ];

        //contare gli elementi dell'array
        $element1 = count($array2);
        print $element1."<br>";
        //aggiungere un elemento all'array (indirizzo)
        $array2["indirizzo"] = "Via Roero, 13";
        print_r($array2)."<br>";
        //contare gli elementi dell'array
        $element2 = count($array2);
        print $element2."<br>";
        //eliminare un elemento dall'array (cognome)
        unset($array2['cognome']);
        print_r($array2)."<br>";
        //contare gli elementi dell'array
        $element3 = count($array2);
        print $element3."<br>";

        $array3 = [
            array([
                "nome" => "Pippo",
                "cognome" => "Pluto",
                "indirizzo" => "Via Caboto 35"
            ]),
            array([
                "nome" => "Paperino",
                "cognome" => "Minnie",
                "indirizzo" => "Via Caboto 40"
            ]),
        ];

        //contare gli elementi dell'array
        $element1 = count($array3);
        print $element1."<br>";
        //aggiungere un elemento all'array (nome:Topolino, cognome:Paperone, indirizzo:via Caboto 60
        $array3[] = ["nome" => "Topolino", "cognome" => "Paperone", "indirizzo" => "via Caboto 60"] ;
        //contare gli elementi dell'array
        $element2 = count($array3);
        print $element2."<br>";
        //eliminare un elemento dall'array (array Paperino)
        unset($array3[1]);
        print_r($array3)."<br>";
        //contare gli elementi dell'array
        $element3 = count($array3);
        print $element3."<br>";
        //eliminare un attributo dall'array Pippo (indirizzo)
        unset($array3[0][0]['indirizzo']);
        print_r($array3)."<br>";
        //contare gli elementi dell'array
        $element4 = count($array3);
        print $element4."<br>";
        //aggiungere un attributo dall'array Topolino (eta)
            $array3[2]["eta"] = "22";
        print_r($array3)."<br>";
        //contare gli elementi dell'array
        $element5 = count($array3);
        print $element5."<br>";
        //contare gli elementi dell'array Topolino
        $element6 = count($array3[2]);
        print $element6."<br>";
    }
}
