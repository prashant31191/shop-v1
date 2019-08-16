<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\{Country,Region,City};

class RegionController extends Controller
{
    public function listCountries(){
        $countries = Country::orderByDesc('id')->get()->toArray();
        return view("admin.regions.countries", ['details' => $countries]);
    }

    public function listRegions(){
        $regions = Region::orderByDesc('id')->get()->toArray();
        return view("admin.regions.regions", ['details' => $regions]);
    }

    public function listCities(){
        $cities = City::orderByDesc('id')->get()->toArray();
        return view("admin.regions.cities", ['details' => $cities]);
    }

    public function deleteCountry($id){
        Country::where('id', $id)->delete();
        return redirect()->to('admin/countries/list');
    }

    public function deleteRegion($id){
        Region::where('id', $id)->delete();
        return redirect()->to('admin/regions/list');
    }
}
