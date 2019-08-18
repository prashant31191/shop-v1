<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\{Email,Client};


class ClientController extends Controller
{
    public function subscribesOld(Request $request){        
        $emails = Email::orderByDesc('id')->get()->toArray();    
        return view("admin.subscribers", ['details' => $emails]);
    }

    public function subscribes(Request $request){        

        $items_per_page = $request->per_page ?? 10;
        $emails = Email::paginate($items_per_page);
        $total_items = $emails->total();

        return view("admin.subscribers", ['details' => $emails, 'items_per_page' => $items_per_page, 'total_items' => $total_items]);

    }

    public function deleteSubscriber($id){
        Email::where('id', $id)->delete();
        return redirect()->to('admin/subscribes/list');
    }

}
