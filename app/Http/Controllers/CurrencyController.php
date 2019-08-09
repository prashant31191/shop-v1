<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function import(){  

        DB::delete('delete from currencies'); // ar trebui empty the table
        print "table deleted<br>";

        $content_symbols = file_get_contents("http://data.fixer.io/api/symbols?access_key=51a1197fe76666425b266c7021e4abaf");
        $symbols = json_decode($content_symbols);

        $content_latest = file_get_contents("http://data.fixer.io/api/latest?access_key=51a1197fe76666425b266c7021e4abaf");
        $latest = json_decode($content_latest);

        if ($symbols->success && $latest->success ) {
            foreach ($symbols->symbols as $code => $name) {
                $c = new Currency();
                $c->name = $name;
                $c->code = $code;        
                
                foreach ($latest->rates as $code => $rate) {
                    if ($code == $c->code) {
                        $c->rate = $rate; 
                    }
                }          

                $c->save();
            }
        }

        print 'import Succesfull';
    }
}
