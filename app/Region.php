<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['region']; 

    public function country(){
        return $this->belongsTo(\App\Country::class);
    }
         
    public function cities(){
        return $this->hasMany(\App\City::class);
    }
}
