<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function(){

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        
        Route::group(['middleware' => [ 'throttle:7,1' ] ], function () {
            Route::post('/login', 'AuthController@login');
            Route::post('/verify', 'AuthController@verify');
        });

        Route::group(['middleware' => [ 'before' => 'jwt.auth', 'after' => 'jwt.refresh' , 'is.blocked', 'check.erpcode'] ], function () {
            Route::post('/logout', 'AuthController@logout');
            Route::post('/refresh/token', 'AuthController@refresh');
            Route::post('/profile', 'AuthController@userProfile');
            Route::post('/profile/edit', 'AuthController@userProfileEdit');

        });
    });

    Route::group(['middleware' => ['jwt.auth', 'profile.complete', 'is.blocked', 'check.erpcode'] ], function () {
        Route::apiResource('orders', 'OrderController')
            ->only(['index', 'show', 'store']);
        Route::get('addresses', 'AddressController@index');
        Route::get('payments', 'PaymentsController@index');
        Route::get('wallets', 'WalletController@index');
        Route::patch('addresses', 'AddressController@update');
    });

    Route::get('orders/courier/cost', 'OrderController@courierCost');

    Route::get('banners', 'BannerController@index');

    Route::get('/pinneds/products', 'PinnedProductController@index');

    Route::get('orders/{order}/cancelled', 'OrderController@cancelled');
    Route::post('orders/save', 'OrderController@save');

    Route::get('products', 'ProductController@index');
    Route::get('products/available/{product:erp_code}', 'ProductController@available');
    Route::get('products/{product:erp_code}', 'ProductController@show');
    Route::get('products/subcategory/{side_group:erp_code}', 'ProductController@getProductsBySubCategory');
    Route::get('products/category/{main_group:erp_code}', 'ProductController@getProductsByCategory');

    Route::get('/vendors', 'VendorController@index')
        ->name('vendors.index');

    Route::get('/vendors/products/{main_group:erp_code}', 'ProductController@getProductsVendorByCategory')
        ->name('vendors.products');

    Route::get('sliders', 'SliderController');
    

    
    Route::get('app/version', 'AppController@version');
    
    Route::get('app/working-time', 'AppController@workingTime');

    Route::get('app/slider-vip', 'AppController@sliderVip');

    Route::get('app/instant-messagings', 'AppController@instantMessagings');
    
    Route::get('app/min-order-amount', 'AppController@minOrderAmount');

    Route::any('carts', 'CartController');
    
    Route::post('cart/total-price', 'CartController@totalPrice');


	Route::get('categories', 'CategoryController@index');

    Route::get('subcategories', 'SubCategoryController@index');
    Route::get('subcategories/category/{main_group:erp_code}', 'SubCategoryController@getSubCategoriesByCategoryErpCode');

});
