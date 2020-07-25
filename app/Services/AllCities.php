<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class AllCities
{

    public static function check_city($argument)
    {

        $city_check = array_map(function ($array) {
            return $array['code'];

        },
            Http::get('https://api.meteo.lt/v1/places/')->json());

            return $city_check;
        //
        // 
        // if (in_array(strtolower($argument), $city_check)) {
        //     return $argument;

        // } else {
        //     return 'blogai';
        // }

    }

}
