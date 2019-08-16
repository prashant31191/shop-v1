<?php
    namespace App\Http\Controllers;
    use App\{Currency,Product};

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
            
            $currencies = Currency::all()
                            ->sortByDesc('code')
                            ->pluck('code');
                            
            dump($currencies);


            return "ok";

        }

        public function list(){
            $products = Product::orderByDesc('id')->get()->toArray();    
            return view("products.list", ['var' => $products]);
        }

        public function delete($id){
            Product::where('id', $id)->delete();
            return redirect()->to('/products/list');
        }
    }

