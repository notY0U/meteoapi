<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\City;
use App\Services\Weather;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request,Weather $weather)
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

            $weather = Weather::currentWeather($request->city)->get('conditionCode');

            $city = City::city($request->city);
            $products = Product::where('tag', $weather)->get()->toJson();

            // dd($products);


            return view('product.index', ['weather' => $weather, 'city' => $city, 'products' => $products]);
        // } else {

        //     return view('product.start');
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
