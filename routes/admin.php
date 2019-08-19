<?php

Route::get('/', function(){
    return view('admin.dashboard');
});

Route::get('/test', 'TestController@test');



// CATEGORIES
Route::resource('/categories', 'CategoryController');
Route::get('/categories', 'CategoryController@index')->name('admin.categories');


// products
Route::get('/products/list', 'ProductController@list')->name('admin.products.list');
Route::get('/products/delete/{id}', 'ProductController@delete');


// IMPORT
Route::get('/import/AliExpress', 'ImportController@importAliExpress')->name('admin.import.aliexpress');
Route::post('/import/Ebay', 'ImportController@importEbay')->name('admin.import.ebay');
Route::get('/import/regions', 'ImportController@regions')->name('admin.import.regions');
Route::get('/import/emails', 'ImportController@emails')->name('admin.import.emails');
Route::get('/import/ebayCategories', 'ImportController@ebayCategories')->name('admin.import.ebayCategories');
Route::get('/import/ebaySubCategories', 'ImportController@ebaySubCategories')->name('admin.import.ebaySubCategories');
Route::get('/import/ebaySubSubCategories', 'ImportController@ebaySubSubCategories')->name('admin.import.ebaySubSubCategories');


// Social Platforms
Route::get('/socials/platforms/new', 'SocialPlatformController@new')->name('socials.platforms.new');
Route::post('/socials/platforms/save', 'SocialPlatformController@save');
Route::get('/socials/platforms/list', 'SocialPlatformController@list')->name('socials.platforms.list');
Route::get('/socials/platforms/delete/{id}', 'SocialPlatformController@delete');


// Social Accounts
Route::get('/socials/new', 'SocialController@new')->name('socials.new');
Route::post('/socials/save', 'SocialController@save');
Route::get('/socials/list', 'SocialController@list')->name('socials.list');
Route::get('/socials/delete/{id}', 'SocialController@delete');


// Regions
Route::get('/countries/list', 'RegionController@listCountries')->name('countries.list');
Route::get('/regions/list', 'RegionController@listRegions')->name('regions.list');
Route::get('/countries/delete/{id}', 'RegionController@deleteCountry');
Route::get('/regions/delete/{id}', 'RegionController@deleteRegion');


// SUBSCRIBERS
Route::get('/subscribes/list', 'ClientController@subscribes')->name('admin.subscribes');
Route::get('/subscribes/delete/{id}', 'ClientController@deleteSubscriber');


