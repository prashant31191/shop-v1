<?php
    namespace App\Http\Controllers;
    use App as App;
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
            
            $faker = Faker::create();

            $products = collect([]);

            for ($n=0; $n < 4; $n++) {                 
                $p = new App\Product();
                $p->__set("name", $faker->name);
                $p->__set("price",rand(100,1000)*10); 

                for ($i=0; $i < rand(3,10); $i++) { 
                    $p->addImage($faker->imageUrl(300, 400));
                }

                $products->push($p);
            }
            $c = new App\Currency("US Dolar", "USD");

            // dd($c);

            return view("products.test", ['products' => $products]);

        }
    }

