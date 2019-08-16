<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\{Email,Client};


class ClientController extends Controller
{
    public function subscribes(Request $request){        
        $emails = Email::orderByDesc('id')->get()->toArray();    
        return view("admin.subscribers", ['details' => $emails]);
    }

    public function deleteSubscriber($id){
        Client::where('id', $id)->delete();
        return redirect()->to('admin/subscribes/list');
    }

}
