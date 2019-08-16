<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    protected $table = 'contact_datas';
    
    public function phones(){
        return $this->hasMany(\App\Phone::class);
    }

    public function country(){
        return $this->belongsTo(\App\Country::class);
    }

    public function city(){
        return $this->belongsTo(\App\City::class);
    }

    public function client(){
        return $this->belongsTo(\App\Client::class);
    }

    public function emails(){
        return $this->hasMany(\App\Email::class);
    }
    public function socials(){
        return $this->hasMany(\App\Socials::class);
    }
}
