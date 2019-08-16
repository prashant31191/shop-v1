<?php
    namespace App\Http\Controllers;
    
    use App\{Currency,Product};
    use App\Http\Controllers\Controller;

    use Faker\Factory as Faker;

    class ProductController extends Controller{

        public function list(){
            $products = Product::orderByDesc('id')->get()->toArray();    
            return view("products.list", ['var' => $products]);
        }

        public function delete($id){
            Product::where('id', $id)->delete();
            return redirect()->to('/products/list');
        }
    }

