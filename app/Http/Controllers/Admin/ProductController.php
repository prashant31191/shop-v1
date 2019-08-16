<?php
    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\{Currency,Product};
    use Faker\Factory as Faker;

    class ProductController extends Controller{

        public function list(){            
            $products = Product::orderByDesc('id')->get()->toArray();    
            return view("admin.products.list", ['details' => $products]);
        }

        public function delete($id){
            Product::where('id', $id)->delete();
            return redirect()->to('admin/products/list');
        }
    }

