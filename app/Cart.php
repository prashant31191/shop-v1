<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SolfDeletes;

class Cart extends Model
{
    public function totalPrice(){
        return $this->morthMany(\App\Price::class, 'priceable');
    }
}
