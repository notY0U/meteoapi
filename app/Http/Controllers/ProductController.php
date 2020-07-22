<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\City;
use App\Services\Weather;
use App\Services\AllCities;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $validator = Validator::make($request->all(),
            [
                'city' => ['required', 'min:3', 'max:64'],
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $info ='naudokite tik tikrus miestu pavadinimus be lietivsku rasmenu';

        $isCity = AllCities::check_city($request->city);
        if($isCity == 'blogai'){
            return view('home', ['info' => $info]);
        }else               //work in progress
        // dd($isCity);
       


        $weather = Weather::currentWeather($isCity)->get('conditionCode');
        $city = City::city($isCity);
        $products = Product::where('tag', $weather)->offset(0)->limit(2)->get();
        $recommend = json_encode(['city' => $city, 'current_weather' => $weather, 'recommended_products'=>$products]);
     
        
        return view('product.index', ['recommend' => $recommend]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
