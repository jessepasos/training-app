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

// Authentication routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// Application routes for authenticated users
Route::get('/home', 'HomeController@index');
Route::get('/commandeer', 'ShipController@commandeer');

Route::post('/commandeer', 'ShipController@postCommandeer');

Route::post('/createPirate', 'PirateController@createPirate');
Route::get('/ports', 'PortController@ports');


Route::get('/attack', 'PortController@attack');