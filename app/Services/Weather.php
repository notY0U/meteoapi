<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Weather {

    
    public static function currentWeather(string $argument){
        
        /*adjust timezone if necessary
        * $timezone = 'Europe/Vilnius'; 
        * $date = new DateTime('now', new DateTimeZone($timezone));
         */   

        $weather = array_map(function($array){
            return  ['forecastTimeUtc' => $array['forecastTimeUtc'],'conditionCode' => $array['conditionCode']];
            
        }, Http::get( 'https://api.meteo.lt/v1/places/'.$argument.'/forecasts/long-term')->json()['forecastTimestamps'] );

        $current_weather = collect($weather[3])->only('conditionCode');

        return $current_weather;
        
    }

}
