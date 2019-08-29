<?php

Route::get('/', function(){
    return view('public.dashboard');
});


Route::resource('/categories', 'CategoryController');
Route::resource('/products', 'ProductController');
Route::resource('/subscribers', 'ClientController');


// PRODUCTS
Route::get('/catalog', 'CatalogController@index')->name('public.catalog');
// Route::resource('/catalog/price/{sort}', 'CatalogController@indexPriceSort');
// Route::get('/catalog/date/{sort}', 'CatalogController@indexDateSort')->name('public.catalog.date');


Route::get('catalog/date/{sort}', 'CatalogController@indexDateSort');
Route::get('catalog/price/{sort}', 'CatalogController@indexPriceSort');

Route::get('/cart/add/{product_id}', 'CartController@add')->name('admin.cart.add');
