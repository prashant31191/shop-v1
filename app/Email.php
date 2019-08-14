<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['email', 'status'];  

    public function contact(){
        return $this->belongsTo(\App\ContactData::class);
    }
}
