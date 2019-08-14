<?php


Route::get('/', function () {
    return view('pages.home');
});

Route::get('/catalog', function () {
    return view('products.catalog');
});

Route::get('/1', function () {
    return view('pages.home');
});


//Route::get('/products/test', 'ProductController@test');

Route::get('/test/run', 'TestController@run');
Route::get('/test/run2', 'TestController@run2');

Route::get('/import/product', 'ImportController@product');
Route::get('/import/productAliExpress', 'ImportController@productAliExpress');
Route::get('/import/importEbay', 'ImportController@importEbay');

Route::get('/import/countries', 'ImportController@countries');