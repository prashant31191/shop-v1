<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = ['name', 'code']; 
     
    public function regions(){
        return $this->hasMany(\App\Region::class);
    }

    public function contactDatas(){
        return $this->hasMany(\App\ContactData::class);
    }
}
