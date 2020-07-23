<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class City {

    
    public static function city(string $argument){
        
            
        return Http::get( 'https://api.meteo.lt/v1/places/'.$argument)->json()['name'];

        
        
    }

}

        // dd($current_weather);