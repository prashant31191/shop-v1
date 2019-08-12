<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['price', 'value', 'discount']; 

    public function currency(){
        return $this->hasMany(\App\Currency::class);        
    }

    public function product(){
        return $this->belongsTo(\App\Product::class);        
    }


}


// Product->price->curency->rate