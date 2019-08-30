<?php

Route::get('/', function(){
    return view('public.dashboard');
});


Route::resource('/categories', 'CategoryController');
Route::resource('/products', 'ProductController');
Route::resource('/subscribers', 'ClientController');
// Route::resource('/cart', 'CartController');


// PRODUCTS
Route::get('/catalog', 'CatalogController@index')->name('public.catalog');
// Route::resource('/catalog/price/{sort}', 'CatalogController@indexPriceSort');
// Route::get('/catalog/date/{sort}', 'CatalogController@indexDateSort')->name('public.catalog.date');


Route::get('catalog/date/{sort}', 'CatalogController@indexDateSort');
Route::get('catalog/price/{sort}', 'CatalogController@indexPriceSort');

Route::get('/cart/add/{product_id}', 'CartController@add')->name('admin.cart.add');

Route::get('/cart/empty', 'CartController@empty')->name('cart.empty');
Route::get('/cart/view', 'CartController@view')->name('cart.view');
Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/cart/plus/{id}', 'CartController@plus')->name('cart.plus');
Route::get('/cart/minus/{id}', 'CartController@minus')->name('cart.minus');
