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
# Get Countries Route
Route::get('countries','WorldController@getCountries');
# Get States Route
Route::get('states/{countryId}','WorldController@getStates');
# Get Cities Route
Route::get('cities/{stateId}/{from?}','WorldController@getCities');
