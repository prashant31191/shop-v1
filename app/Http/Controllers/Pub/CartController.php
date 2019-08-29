<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Cart,CartItem,City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product,Email, Category};
use Artisan;


class CartController extends Controller
{
    public function add($id){

        // Artisan::call('migrate:refresh');


        $currency = Currency::where('id', 1)->first();
        $price = Price::where('priceable_id', $id)->first();
        $product = Product::where('id', $id)->first();

        // $exist = Category::where('id', 1)->first();
        // if ( ($exist === null) ) {
        //     Cart::create()->totalPrice()->save($price);
        // }
        
        // $product->prices()->save($price);

        // $product->prices()->save($price);        


        // check if product exist in cartItem       
        $exist = CartItem::where('product_id', $id)->first();
        if ( ($exist === null) ) {
            CartItem::create([
                'product_id' => $product->id,
                'cart_id' => 1,
                'amount' => 1,
            ]);
        }else{
            $total = CartItem::where('product_id', $id)->first();
 
            CartItem::where('product_id', $id)->update(['amount' => $total->amount+1]);
        }
        
        return redirect()->to('catalog');


    }
}
