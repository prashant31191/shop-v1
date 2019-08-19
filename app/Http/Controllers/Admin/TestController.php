<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product,Email, Category};

use Faker\Factory as Faker;

class TestController extends Controller
{
  
    public function test(){

        $faker = Faker::create();

        // Category::truncate();
        
        $category1 = Category::create([
            // 'name' => 'Porumb',
            'name' => $faker->name,
        ]);

        $category2 = Category::create([
            // 'name' => 'Pop Corn',
            'name' => $faker->name,
        ]);

        $category3 = Category::create([
            // 'name' => 'Pop Corn Sarat',
            'name' => $faker->name,
        ]);

        $category4 = Category::create([
            // 'name' => 'Pop Corn Dulce',
            'name' => $faker->name,
        ]);

        $category1->children()->save($category2);

        $category3->parent()->associate($category2);
        $category3->save();

        $category4->parent()->associate($category1);
        $category4->save();


        $result = Category::where('name', 'Porumb')->get();



        dd($result->first()->children);

     


    }

}
