<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product};

class TestController extends Controller
{
  
    public function run2()
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

        //$currency = Currency::find(1);        
        $p1 = Product::find(1);        

        dump($p1->prices()->first()->currency);

        // $c1->rates; // get data
        // $c1->rates(); // get object of relation

    }


    public function run(){

        $client = Client::create([
            'fullname' => 'mike Smith'
        ]);

        $contact_data = ContactData::create();

        $country = Country::create([
            'name' => 'Republic of Moldova',
            'code' => 'MD',
        ]);

        $city = City::create([
            'name' => 'Chisinau',
            'code' => 'C',
        ]);

        $phone1 = Phone::create([
            'number' => '+373 69000000',
            'is_mobile' => true,
        ]);

        $phone2 = Phone::create([
            'number' => '+373 79000000',
        ]);


        // legaturi
        $contact_data->phones()->save($phone1);
        $contact_data->phones()->save($phone2);

        $contact_data->country()->associate($country);


        $contact_data->city()->associate($city); 
        $city->country()->associate($country);
        $city->save();

        $contact_data->client()->associate($client);

        $contact_data->save();


        // xxx()->associates(enti)
        // xxxx() this-> many()
        // xxxx->save($entity)
        


    }

  

}
