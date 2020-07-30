<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\AllCities;
use App\Services\City;
use App\Services\Weather;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

        $isCity = AllCities::check_city($request->city);
        // dd($isCity);
        // try {

        $validator = Validator::make($request->all(),
            [
                'city' => [
                    'required',
                    Rule::in($isCity),
                ],
            ]
        );
        if ($validator->fails()){

            return response()->json(['code' =>404, 'message' => 'END POINT NOT VALID']);
        }

        // get original city name
            $city = City::city($request->city);

        // get current weather for the location
        $weather = Weather::currentWeather($request->city)->get('conditionCode');

        $products = Product::all()->filter(function ($product) use ($weather) {
            return in_array($weather, $product->tags()->pluck('name')->toArray());
        })->take(2);
        //get recommended products for the weather
        $recommend = ['city' => $city, 'current_weather' => $weather, 'recommended_products' => $products, 'source data:' => 'Lietuvos hidrometeorologijos tarnyba'];

        return response()->json($recommend);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
