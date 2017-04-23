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

/**
*  Register
*/
Route::post('/register', 'RegistrationController@CreateAccount');


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
*  /order
*/
Route::get('/order', 'OrderController@show');

/**
*  /order/cheese
*/
Route::get('/order/cheese', 'OrderController@cheese');

/**
*  /order/peperroni
*/
Route::get('/order/pepperoni', 'OrderController@pep');
/**
*  /registration
*/
Route::get('/registration', 'RegistrationController@show');



Auth::routes();

Route::get('/home', 'HomeController@index');
