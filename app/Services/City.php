<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class City {

    
    public static function city(string $argument){
        
            
            $city = Http::get( 'https://api.meteo.lt/v1/places/'.$argument)->json()['name'];

        return $city;
        
    }

}

        // dd($current_weather);