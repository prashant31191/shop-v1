<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Artisan;

class BackupController extends Controller
{
    
    public function backUpAll(Request $request){
        Artisan::call('backup:run'); 
        return "BuckUp All Succesfull";
    }

    public function backUpDb(Request $request){
        Artisan::call('backup:run --only-db'); 
        return "BuckUp All Succesfull";
    }
    
    public function backUpFiles(Request $request){
        Artisan::call('backup:run --only-files'); 
        return "BuckUp All Succesfull";
    }
}
