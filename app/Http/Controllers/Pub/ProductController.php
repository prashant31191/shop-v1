<?php
    namespace App\Http\Controllers\Pub;

    use App\Http\Controllers\Controller;
    use App\{Currency,Product};

    class ProductController extends Controller{

        public function products(){            
            $products = Product::orderByDesc('id')->get()->toArray();    
            return view("public.products.list", ['details' => $products]);
        }

    }

