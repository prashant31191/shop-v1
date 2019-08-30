<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{CartItem,Currency,Price,Product};

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

    public function view()
    {
        $cart_items = CartItem::where('cart_id', 1)->get();
        return view("public.cart.index", compact('cart_items'));
    }

    public function remove($id)
    {
        $to_delete = CartItem::where('id', $id)->delete();
        // dd($to_delete);
        $cart_items = CartItem::where('cart_id', 1)->get();
        return view("public.cart.index", compact('cart_items'));
    }

    public function empty($id)
    {
        CartItem::trucate();       
        return view("public.catalog");
    }

    public function minus($id)
    {
        $total = CartItem::where('id', $id)->first();

        if ($total->amount == 1) {
            CartItem::where('id', $id)->delete();
         }else{
            CartItem::where('id', $id)->update(['amount' => $total->amount-1]);
        }

        $cart_items = CartItem::where('cart_id', 1)->get();
        return view("public.cart.index", compact('cart_items'));
    }
    public function plus($id)
    {
        $total = CartItem::where('id', $id)->first();
        CartItem::where('id', $id)->update(['amount' => $total->amount+1]);
        $cart_items = CartItem::where('cart_id', 1)->get();
        return view("public.cart.index", compact('cart_items'));
    }
}
