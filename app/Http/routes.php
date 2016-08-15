<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::auth();

Route::get('/the-black-perl', 'ShipController@theBlackPerl');
Route::get('/pirate/{id}', 'PirateController@index');
Route::post('/pirate/{id}', 'PirateController@store');

Route::get('/seaport',  'SeaportController@index');
Route::get('/seaport/{id}',  'SeaportController@show');
Route::post('/seaport/{id}', 'SeaportController@update');

Route::post('/seaport/{id}/attack', 'SeaportController@getAttacked');
