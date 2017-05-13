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
use App\User;

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
*  /edit
*/
Route::get('/edit/{id}', 'PizzaController@edit');

/**
*  /delete
*/
# Get route to confirm deletion of user
Route::get('/delete/{id}', 'PizzaController@confirmDeletion');

# Post route to actually destroy the user
Route::post('/delete', 'PizzaController@delete');

/**
*  /saveEdit
*/
Route::post('/save', 'PizzaController@saveEdits');

/**
*  /newOrder
*/
Route::get('/newOrder', 'PizzaController@showNewOrder');

/**
*  /order
*/
Route::get('/order', 'CartController@show');

/**
*  /order
*/
Route::get('/reOrder', 'reOrderController@getPrevOrders');

/**
*  /reorder_submit
*/
Route::post('/reorder_submit', 'reOrderController@submit');

/**
*  /remove
*/
Route::post('/order/remove', 'CartController@removeItem');

/**
*  /clearCart
*/
Route::post('/clearCart', 'CartController@clearCart');

/**
*  /order/popPizza
*/
Route::post('/popOrder', 'CartController@addItem');

/**
*  /order/update
*/
Route::post('/order/update', 'CartController@updateCart');

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
Route::post('/order/submit', 'CartController@submitOrder');

Auth::routes();

Route::get('/home', 'HomeController@index');

