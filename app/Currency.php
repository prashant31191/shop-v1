<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // configuram modelulu
    protected $fillable = ['name', 'code'];


    public function rates(){
        return $this->hasMany(\App\CurrencyRate::class);
    }

    public function price(){
        return $this->belongsTo(\App\Price::class);        
    }


    //
}
