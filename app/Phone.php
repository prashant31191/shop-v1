<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['number', 'is_mobile'];  

    public function contact(){
        return $this->belongsTo(\App\ContactData::class);
    }
}
