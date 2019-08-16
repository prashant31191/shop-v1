<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\{Social,SocialPlatform,ContactData};

class SocialController extends Controller
{
    public function new(){
        $social_platforms = SocialPlatform::get();
        $contact_data = ContactData::get();
            return view("admin.socials.new", 
                ['social_platforms' => $social_platforms], 
                ['contact_data' => $contact_data], 
        );
    }

    public function save(){

        // dd(Input::post());

        $social = Social::create([
            'nickname' => Input::post('name'),
            'social_platform_id' => Input::post('social_platform_id'),
            'contact_data_id' => Input::post('contact_data_id'),
        ]);

        // dd($social);

        return redirect()->to('admin/socials/list');
    }

    public function list(){
        $social = Social::orderByDesc('id')->get()->toArray();

        return view("admin.socials.list", ['details' => $social]);
    }

    public function delete($id){
        Social::where('id', $id)->delete();
        return redirect()->to('admin/socials/list');
    }
}
