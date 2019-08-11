<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Currency,CurrencyRate};

class TestController extends Controller
{
    //

    public function run()
    {

        // $c1 = Currency::create([
        //     'name' => 'US Dollar',
        //     'code' => 'USD',
        // ]);

        // $cr1 = CurrencyRate::create([
        //     'rate' => 18.501,
        // ]);

        $c1 = Currency::find(1);

        
        //$c1->rates()->save($cr1);
        dump($c1->rates->sortByDesc('created_at')->first());

        // $c1->rates; // get data
        // $c1->rates(); // get object of relation

    }
}
