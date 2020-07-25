<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Weather {

    
    public static function currentWeather(string $argument){
       
          

        $weather = array_map(function($array){
            return ['forecastTimeUtc' => $array['forecastTimeUtc'],'conditionCode' => $array['conditionCode']];
            
        }, Http::get( 'https://api.meteo.lt/v1/places/'.$argument.'/forecasts/long-term')->json()['forecastTimestamps']);
        
        return  collect($weather[3])->only('conditionCode');

       
        
    }

}

        // dd($current_weather);