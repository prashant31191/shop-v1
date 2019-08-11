<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    //
    protected $fillable = ['rate'];   

    public function currency(){
        return $this->belongsTo(\App\CurrencyRate::class);
    }

}


