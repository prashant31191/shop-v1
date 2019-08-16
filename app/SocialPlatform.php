<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialPlatform extends Model
{
    protected $fillable = ['name']; 

    public function socials(){
        return $this->hasMany(\App\Social::class);
    }
}
