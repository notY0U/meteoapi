<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class AllCities
{

    public static function check_city($argument)
    {
        
        $city_check = array_map(function ($array) {
            return ['code' => $array['code'], 'name' =>$array['name']];
            
        },
        
         Http::get('https://api.meteo.lt/v1/places/')->json());
         $byCode = Arr::pluck($city_check, ['code']);
        //  $byName = Arr::pluck($city_check, ['name']);
        //  dd($byName);
        if(in_array(strtolower($argument), $byCode)){
            return $argument;

        // }elseif(in_array(ucfirst($argument), $byName)){

        //     return $argument;

        }else

        return 'blogai';
        // return $city_check;
    }

       



}
