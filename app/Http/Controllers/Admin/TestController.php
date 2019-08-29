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

        $price1 = Price::create([
            'value' => 120,
            'disount' => 120,
        ]);

        $price2 = Price::create([
            'value' => 185
        ]);

        $price3 = Price::create([
            'value' => 225
        ]);

        $price1->currency()->associate($currency)->save();
        $price2->currency()->associate($currency)->save();
        $price3->currency()->associate($currency)->save();
        
        $product1= Product::create([
            'name' => 'iPhone 9'
        ]);



        // dd($product);

        $product1->prices()->save($price2);

        // dd($product1);

        Cart::create()->totalPrice()->save($price1);
        Cart::create()->totalPrice()->save($price3);

    }

}
