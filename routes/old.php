<?php

use App\{SocialPlatform};

Route::get('/', function () {
    return view('layouts.app');
});

///////////////////////////////////////////////////////////

// products
// Route::get('/subscribe', 'ClientController@subscribe');

// Route::get('/subscribe', function () {
//     return view('layouts.subscribe');
// });

Route::get('/subscribe', 'ClientController@subscribeForm')->name('client.subscribe');
Route::post('/subscribe', 'ClientController@subscribe');

// // products
// Route::get('/products/list', 'ProductController@list');
// Route::get('/products/delete/{id}', 'ProductController@delete');


// // import
// Route::get('/import/AliExpress', 'ImportController@importAliExpress');
// Route::post('/import/Ebay', 'ImportController@importEbay');
// Route::get('/import/regions/{limit}', 'ImportController@regions');


// // Social Platforms
// Route::get('/socials/platforms/new', 'SocialPlatformController@new');
// Route::post('/socials/platforms/save', 'SocialPlatformController@save');
// Route::get('/socials/platforms/list', 'SocialPlatformController@list');
// // Route::get('/socials/platforms/edit', 'SocialPlatformController@edit');
// Route::get('/socials/platforms/delete/{id}', 'SocialPlatformController@delete');


// // Social Accounts
// Route::get('/socials/new', 'SocialController@new');
// Route::post('/socials/save', 'SocialController@save');
// Route::get('/socials/list', 'SocialController@list');
// // Route::get('/socials/edit', 'SocialController@edit');
// Route::get('/socials/delete/{id}', 'SocialController@delete');


// // Regions
// Route::get('/listregion/countries', 'RegionController@listCountries');
// Route::get('/listregion/regions', 'RegionController@listRegions');
// Route::get('/listregion/cities', 'RegionController@listCities');
