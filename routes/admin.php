<?php

use App\{SocialPlatform};

// rute administrative

Route::get('/', function(){
    return view('admin.dashboard');
});

Route::get('/test', function(){
    return 'test normal';
});

