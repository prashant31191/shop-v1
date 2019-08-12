<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Currency,CurrencyRate,Product,Price};

class TestController extends Controller
{
  
    public function run()
    {

        $product = Product::create([
            'name' => 'iPhone 7',
            'description' => 'Super phone',
        ]);

        $product_price = Price::create([
            'value' => 320.40,
            'discount' => true,
        ]);

        $currency = Currency::create([
            'name' => 'US Dollar',
            'code' => 'USD',
        ]);

        $currency_rate = CurrencyRate::create([
            'rate' => 19.501,
        ]);

        $product->prices()->save($product_price);
        $currency->rates()->save($currency_rate);

        $product_price->currency()->save($currency);



        //$currency = Currency::find(1);        
        $p1 = Product::find(1);        

        dump($p1->prices()->first()->currency);

        // $c1->rates; // get data
        // $c1->rates(); // get object of relation

    }

  

}
