<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Dashboard',
    ], function () {
        Route::group([
        'middleware' => [
            'auth',
            'is.admin',
        ],
        'prefix' => 'dashboard',
        'as' => 'dashboard.',
        ], function () {
            Route::get('/', 'AdminController@index')
                ->name('index');

            Route::get('/products', 'ProductController')
                ->name('products.index');
                
            Route::get('/settings', 'SettingController@index')
                ->name('settings.index');

            Route::post('/settings', 'SettingController@store')
                ->name('settings.store');

            Route::get('/categories', 'CategoryController@index')
                ->name('categories.index');

            Route::get('/categories/{main_group}/edit', 'CategoryController@edit')
                ->name('categories.edit');

            Route::put('/categories/{main_group}', 'CategoryController@update')
                ->name('categories.update');

            Route::get('/products/edit/{product}', 'ProductController@edit')
                ->name('products.edit');
                
                 Route::put('/products/{product}', 'ProductController@update')
                ->name('products.update');

            Route::get('/users', 'UserController')
                ->name('users.index');
                
            Route::get('/units', 'UnitController@index')
                ->name('units.index');
            
            Route::get('/units/{unit}/edit', 'UnitController@edit')
                ->name('units.edit');
                
            Route::put('/units/{unit}', 'UnitController@update')
                ->name('units.update');

            Route::get('/sliders', 'SliderController')
                ->name('sliders.index');

            Route::get('/orders', 'OrderController@index')
                ->name('orders.index');

            Route::get('/orders/{order}', 'OrderController@show')
                ->name('orders.show');

            Route::get('/payments', 'PaymentController@index')
                ->name('payments.index');

            Route::resource('banners', 'BannerController');

            Route::resource('pinned_products', 'PinnedProductController');

            Route::get('wallets', 'WalletController')->name('wallets.index');
        });
    });
