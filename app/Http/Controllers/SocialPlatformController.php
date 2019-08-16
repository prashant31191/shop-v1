<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\{SocialPlatform};

class SocialPlatformController extends Controller
{
    public function new(){
        return view("socials.platforms.new");
    }

    public function save(){
        $social_platform = SocialPlatform::create([
            'name' => Input::post('name'),
        ]);

        return redirect()->to('/socials/platforms/list');
    }

    public function list(){
        $social_platforms = SocialPlatform::orderByDesc('id')->get()->toArray();

        return view("socials.platforms.list", ['social_platforms' => $social_platforms]);
    }

    public function delete($id){
        SocialPlatform::where('id', $id)->delete();

        return redirect()->to('/socials/platforms/list');
    }

}
