<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Auth',
    ], function () {
        Route::get('/login', 'AuthController@login')
        ->name('login');

        Route::get('/logout', 'AuthController@logout')
        ->name('logout')
        ->middleware('auth');
    });
