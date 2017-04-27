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
