<?php

Route::get('/', function(){
    return view('public.dashboard');
});


Route::resource('/categories', 'CategoryController');


// SUBSCRIBERS
Route::get('/subscribe', 'ClientController@subscribeForm')->name('subscribe');
Route::post('/subscribe', 'ClientController@subscribe');


// PRODUCTS
Route::get('/products', 'ProductController@products')->name('products');

