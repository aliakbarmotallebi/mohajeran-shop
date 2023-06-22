<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Models\Payment;

// Webhook url get data form Holoo system:
Route::get('logs/webhook', function () {
    return \App\Models\Log::latest('id')->get();
});

// Webhook url get data form Holoo system:
Route::post('/webhook', 'WebHookController');



// Route::get('/', 'HomeController@index');
Route::redirect('/', '/index');

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
                $checkPayment = Payment::whereResnumber('2133da1d-3d84-4fdc-b34c-b990b1186e6e');
            if($checkPayment->exists()){
                $payment = $checkPayment->first();
                $payment->update([
                    'status' => 'PAID'
                ]);
                
                $payment->wallet->update([
                    'status' => 'STATUS_COMPLETED'
                ]);
                
            }
    // \Artisan::call('optimize');
    // echo "<pre>";
    // return \Artisan::output();
});
