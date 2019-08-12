<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = ['name', 'code']; 
     
    public function cities(){
        return $this->hasMany(\App\Country::class);
    }

    public function contactDatas(){
        return $this->hasMany(\App\ContactData::class);
    }
}
