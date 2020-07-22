<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\City;
use App\Services\Weather;
use App\Services\AllCities;
use Illuminate\Http\Request;

use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Weather $weather, Request $request)
    {

        
        $info ='naudokite tik tikrus miestų pavadinimus be lietiviškų rašmenų ar skaičių';


        // check if city exsist in API
        $isCity = AllCities::check_city($request->city);
        if($isCity == 'blogai'){
            return view('home', [$info]);
        }else               
       
        // get original city name
        $city = City::city($isCity);

        // get current weather for the location
        $weather = Weather::currentWeather($isCity)->get('conditionCode');

        //get recommended products for the weather
        $products = Product::where('tag', $weather)->offset(0)->limit(2)->get();
        $recommend = json_encode(['city' => $city, 'current_weather' => $weather, 'recommended_products'=>$products]);
     
        return response()->json($recommend);

        // return view('product.index', ['recommend'=>$recommend]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
