<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// Webhook url get data form Holoo system:
Route::get('logs/webhook', function () {
    return \App\Models\Log::latest('id')->get();
});

// Webhook url get data form Holoo system:
Route::post('/webhook', 'WebHookController');

Route::get('/', 'HomeController@index');


Route::get('/privacy-policy', 'HomeController@privacy');

//insert image from google:
Route::get('/uploadImage', 'UploadImageController@uploadeImage');

//Init project:
    // [
    //     'fetch:unit',
    //     'holoo:products',
    //     'holoo:customers',
    //     'holoo:main-groups',
    //     'holoo:side-groups',
    //     'fetch:products',
    //     'fetch:customers'
    // ];

// Route::get('/cost', function(){
//     \Artisan::call('fetch:courier:cost', ['--code' => '258963147']);
//     echo "<pre>";
//     return \Artisan::output();
// });

// Route::get('/migrate', function(){
//     Artisan::call('migrate');
//     echo "<pre>";
//     return Artisan::output();
// });

Route::get('/run', function () {
    // \Artisan::call('fetch:products');
    // echo "<pre>";
    // return \Artisan::output();
});
