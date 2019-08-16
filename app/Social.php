<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['nickname', 'social_platform_id', 'contact_data_id']; 

    public function social(){
        return $this->belongsTo(\App\Social::class);
    }
    public function contactdata(){
        return $this->belongsTo(\App\ContactData::class);
    }
}
