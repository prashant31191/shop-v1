<?php

Route::get('/', function(){
    return view('public.dashboard');
});

// SUBSCRIBERS
Route::get('/subscribe', 'ClientController@subscribeForm')->name('subscribe');
Route::post('/subscribe', 'ClientController@subscribe');


// PRODUCTS
Route::get('/products', 'ProductController@products')->name('products');

