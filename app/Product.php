<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'description', 'image'];
    // protected $with = ['prices'];


    public function prices(){
        return $this->morphMany(\App\Price::class, 'priceable');
    }


    // public function images(){
    //     return $this->hasMany(\App\Image::class);
    // }

    // public function cheapestPrice(){
    //     return $this->hasOne(\App\Price::class)->orderBy('value', 'desc');
    //     //return $this->prices()->limit(1);
    //     // return $this->hasMany(\App\Price::class)->orderBy('value', 'desc')->latest();
    // }

}
