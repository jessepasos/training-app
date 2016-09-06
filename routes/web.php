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
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
Route::get('/the-black-perl', 'ShipController@theBlackPerl');
Route::get('/pirate/{id}', 'PirateController@index');
Route::post('/pirate/{id}', 'PirateController@store');

// The first ship the user gets
Route::get('/commandeer', 'ShipController@commandeer');
Route::post('/commandeer', 'ShipController@saveShip');

//Pirate recruiting
Route::get('/recruit', 'PirateController@recruit');
Route::post('/recruit', 'PirateController@savePirate');