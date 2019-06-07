<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('ApiV1')->group(function () {
	Route::get('/currencies', 'CurrencyController@index');
	Route::get('/currency/{id}', 'CurrencyController@show');
});

