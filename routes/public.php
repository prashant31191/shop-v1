<?php

Route::get('/', function(){
    return view('public.dashboard');
});


// CATEGORIES
Route::resource('/categories', 'CategoryController', ['names' => [
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
    'show' => 'categories.show',
    'edit' => 'categories.edit',
    'update' => 'categories.update',
    'destroy' => 'categories.destroy',
]]);


// PRODUCTS
Route::resource('/products', 'ProductController', ['names' => [
    'index' => 'products.index',
    'create' => 'products.create',
    'store' => 'products.store',
    'show' => 'products.show',
    'edit' => 'products.edit',
    'update' => 'products.update',
    'destroy' => 'products.destroy',
]]);


// SUBSCRIBERS
Route::resource('/subscribers', 'ClientController', ['names' => [
    'index' => 'subscribers.index',
    'create' => 'subscribers.create',
    'store' => 'subscribers.store',
    'show' => 'subscribers.show',
    'edit' => 'subscribers.edit',
    'update' => 'subscribers.update',
    'destroy' => 'subscribers.destroy',
]]);