<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class GetCityController extends Controller
{
    public function city($code)
    {
        $cities = City::where('code', 'LIKE',"$code%")->get();
        return response()->json($cities);
    }
}
