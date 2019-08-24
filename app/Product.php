<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image']; 

    public function prices(){
        return $this->hasMany(\App\Price::class);
    }

    public function images(){
        return $this->hasMany(\App\Image::class);
    }
    
    
    public function cheapestPrice(){
        return $this->hasOne(\App\Price::class)->orderBy('value', 'desc');
        // return $this->hasMany(\App\Price::class)->orderBy('value', 'desc')->latest();
    }

}
