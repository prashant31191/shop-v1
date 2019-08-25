<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['price', 'value', 'discount']; 

    public function currencies(){
        return $this->hasMany(\App\Currency::class);
    }

    public function priceable(){
        // return $this->belongsTo(\App\Product::class); 
        return $this->morthTo();       
    }

    public function currency(){
        return $this->belongsTo(\App\Currency::class);        
    }


}


// Product->price->curency->rate