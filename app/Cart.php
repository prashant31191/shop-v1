<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SolfDeletes;

use SoftDeletes;

class Cart extends Model
{

    public function totalPrice(){
        return $this->morphMany(\App\Price::class, 'priceable');
    }

    public function items(){
        return $this->hasMany(\App\CartItem::class);
    }

    public function itemPrice(){
        return $this->morphMany(\App\Price::class, 'priceable');
    }
}

