<?php

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('/subscribe', 'ClientController@subscribeForm')->name('client.subscribe');
Route::post('/subscribe', 'ClientController@subscribe');
