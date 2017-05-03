<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

/**
*  Main home page visitors see when they visit just /
*/
Route::get('/', 'PizzaController@show');

/**
*  /pizza
*/
Route::get('/popPizzas', 'PizzaController@show2');

/**
*  /newOrder
*/
Route::get('/newOrder', 'pizzaController@showNewOrder');

/**
*  /order
*/
Route::get('/order', 'CartController@show');

/**
*  /order
*/
Route::get('/reOrder', 'ReorderController@show');

/**
*  /reorder_submit
*/
Route::post('/reorder_submit', 'ReorderController@submit');

/**
*  /remove
*/
Route::post('/order/remove', 'CartController@remove');

/**
*  /clearCart
*/
Route::post('/clearCart', 'CartController@clearCart');

/**
*  /order/popPizza
*/
Route::post('/popOrder', 'CartController@order');

/**
*
*  post
*  /newOrder
*/
Route::post('/newOrder', 'CartController@CreateOwnOrder');

/**
*  post
*  /order/execute
*/
Route::post('/order/execute', 'CartController@execute');

Auth::routes();

Route::get('/home', 'HomeController@index');

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database pizza_shop');
        DB::statement('CREATE database pizza_shop');

        return 'Dropped pizza_shop; created pizza_shop.';
    });

};
