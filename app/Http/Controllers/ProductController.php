<?php

namespace App\Http\Controllers;


use App\Services\Weather;
use App\Services\City;
use App\Product;
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

        $weather = Weather::currentWeather($request->city)->get('conditionCode');
        // dd($weather);

        $city = City::city($request->city);
        $products=Product::where('tag', $weather)->get();
        return view('product.index', ['weather' => $weather, 'city' => $city, 'products'=> $products]);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
