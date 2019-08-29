<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['product_id', 'cart_id', 'amount'];
    
    public function itemPrice(){
        return $this->hasOne(\App\Price::class);
    }

    public function product(){
        return $this->hasOne(\App\Product::class);
    }

    public function cart(){
        return $this->hasOne(\App\Cart::class);
    }
    
}
