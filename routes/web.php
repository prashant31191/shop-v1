<?php


Route::get('/', function () {
    return view('pages.home');
});


Route::get('/products/test', 'ProductController@test');


Route::get('/currency/import', 'CurrencyController@import');
