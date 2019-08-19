<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\{Email};


class ClientController extends Controller
{
    public function subscribeForm(){
        
        return view("public.subscribe");
    }

    public function subscribe2(){
        
        return Input::post();

    }

    public function subscribe(Request $request){
        
        Email::create([
            'email' => $request->email,
            'status' => true
        ]);

        $email = $request->input("email");
        return view("public.subscribed", compact('email') );

    }

}
