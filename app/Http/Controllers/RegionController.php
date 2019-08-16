<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Country,Region,City};

class RegionController extends Controller
{
    public function listCountries(){
        $countries = Country::orderByDesc('id')->get()->toArray();
        return view("listregion.countries", ['var' => $countries]);
    }

    public function listRegions(){
        $regions = Region::orderByDesc('id')->get()->toArray();
        return view("listregion.regions", ['var' => $regions]);
    }

    public function listCities(){
        $cities = City::orderByDesc('id')->get()->toArray();
        return view("listregion.cities", ['var' => $cities]);
    }
}
