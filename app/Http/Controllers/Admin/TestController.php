<?php

namespace App\Http\Controllers\Admin;

use Artisan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Cart,City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product,Email, Category};

use Faker\Factory as Faker;

class TestController extends Controller
{
  
    public function test(){

        Artisan::call('migrate:refresh');

        $currency = Currency::create([
            'code' => 'EUR',
            'name' => 'Euro'
        ]);

        $price = Price::create([
            'value' => 120,
            'disount' => 120,
        ]);

        $price2 = Price::create([
            'value' => 185
        ]);
    
        $price3 = Price::create([
            'value' => 225
        ]);

        $price->currency()->associate($currency)->save();
        $price2->currency()->associate($currency)->save();
        $price3->currency()->associate($currency)->save();
        
        $product= Product::create([
            'name' => 'iPhone 9'
        ]);

        $product->prices()->save($price);
       
        Cart::create()->total_price()->save($price);
        Cart::create()->total_price()->save($price2);
        Cart::create()->total_price()->save($price3);

        
        // $cart2->delete();





    }

}
