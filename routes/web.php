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
*  Main home page visitors see when they visit just /
*/
Route::get('/', 'pizzaController@show');


/**
*  /pizza
*/
Route::get('/popPizzas', 'pizzaController@show2');
