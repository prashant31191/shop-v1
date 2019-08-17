<?php

Route::get('/', function(){
    return view('public.dashboard');
});

// SUBSCRIBERS
Route::get('/subscribe', 'ClientController@subscribeForm')->name('subscribe');
Route::post('/subscribe', 'Pub\ClientController@subscribe');


