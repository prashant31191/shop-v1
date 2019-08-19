<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\{City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product,Email, Category};

use Faker\Factory as Faker;

class TestController extends Controller
{
  
    public function test(){


        // Category::truncate();
        
        // $category1 = Category::create([
        //     'name' => 'Porumb',
        //     //'name' => $faker->name,
        // ]);

        // $category2 = Category::create([
        //     'name' => 'Pop Corn',
        // ]);

        // $category3 = Category::create([
        //     'name' => 'Pop Corn Sarat',
        // ]);

        // $category4 = Category::create([
        //     'name' => 'Pop Corn Dulce',
        // ]);

        // $category1->children()->save($category2);

        // $category3->parent()->associate($category2);
        // $category3->save();

        // $category4->parent()->associate($category1);
        // $category4->save();


        $result = Category::where('name', 'Porumb')->get();



        //dd($result->first()->children);

        foreach ($result->first()->children as $key => $value) {
            print $value."<br>";
        }


    }

}
