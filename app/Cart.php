<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SolfDeletes;

use SoftDeletes;

class Cart extends Model
{

    public function total_price(){
        return $this->morphMany(\App\Price::class, 'priceable');
    }

}
