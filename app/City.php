<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'code'];  

    public function region(){
        return $this->belongsTo(\App\Regions::class);
    }

    public function contactDatas(){
        return $this->hasMany(\App\ContactData::class);
    }
}


