<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // configuram modelulu
    protected $fillable = ['name', 'code', 'rate'];

    //
}
