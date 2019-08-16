<?php

Route::get('/', function(){
    return view('admin.dashboard');
});

// products
Route::get('/products/list', 'Admin\ProductController@list')->name('admin.products.list');
Route::get('/products/delete/{id}', 'Admin\ProductController@delete');


// IMPORT
Route::get('/import/AliExpress', 'Admin\ImportController@importAliExpress')->name('admin.import.aliexpress');
Route::post('/import/Ebay', 'Admin\ImportController@importEbay')->name('admin.import.ebay');
Route::get('/import/regions', 'Admin\ImportController@regions')->name('admin.import.regions');
Route::get('/import/emails', 'Admin\ImportController@emails')->name('admin.import.emails');


// Social Platforms
Route::get('/socials/platforms/new', 'Admin\SocialPlatformController@new')->name('socials.platforms.new');
Route::post('/socials/platforms/save', 'Admin\SocialPlatformController@save');
Route::get('/socials/platforms/list', 'Admin\SocialPlatformController@list')->name('socials.platforms.list');
Route::get('/socials/platforms/delete/{id}', 'Admin\SocialPlatformController@delete');


// Social Accounts
Route::get('/socials/new', 'Admin\SocialController@new')->name('socials.new');
Route::post('/socials/save', 'Admin\SocialController@save');
Route::get('/socials/list', 'Admin\SocialController@list')->name('socials.list');
Route::get('/socials/delete/{id}', 'Admin\SocialController@delete');


// Regions
Route::get('/countries/list', 'Admin\RegionController@listCountries')->name('countries.list');
Route::get('/regions/list', 'Admin\RegionController@listRegions')->name('regions.list');
Route::get('/countries/delete/{id}', 'Admin\RegionController@deleteCountry');
Route::get('/regions/delete/{id}', 'Admin\RegionController@deleteRegion');


// SUBSCRIBERS
Route::get('/subscribes/list', 'Admin\ClientController@subscribes')->name('admin.subscribes');
Route::get('/subscribes/delete/{id}', 'Admin\ClientController@deleteSubscriber');


