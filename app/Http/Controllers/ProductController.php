<?php
    namespace App\Http\Controllers;
    use App\Currency;

    use Faker\Factory as Faker;

    class ProductController extends Controller{

        public function index(){
            // imbracam array in colection
            // obict de tip collection

            $products = collect([
                ['name' => 'Product 1', 'price' => 1000],
                ['name' => 'Product 2', 'price' => 2000],
                ['name' => 'Product 3', 'price' => 3000],
            ])
            ->sortByDesc('price')
            ->where('price', '>', 1000);

            //dd($products);

            return view("products.catalog", ['products' => $products]);
        }


        public function test(){
            
            // $c1 = new Currency();
            // $c1->name = "EURO";
            // $c1->code = "EUR";
            // $c1->save();

            // Currency::create([
            //     'name' => 'US Dollar',
            //     'code' => 'USD'
            // ]);

            $currencies = Currency::all()
                            ->sortByDesc('code')
                            ->pluck('code');
                            
            dump($currencies);


            return "ok";

        }
    }

