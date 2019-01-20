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

Route::get('/', function () {
    return view('home');
});

Route::get('passenger/tambah','passengerController@create');
Route::post('passenger/tambah','passengerController@store');
Route::get('passenger','passengerController@index');
Route::get('passenger/ubah/{id}','passengerController@edit');
Route::post('passenger/ubah/{id}','passengerController@update');
Route::delete('passenger/{id}','passengerController@destroy');

Route::get('cargo/tambah','cargoController@create');
Route::post('cargo/tambah','cargoController@store');
Route::get('cargo','cargoController@index');
Route::get('cargo/ubah/{id}','cargoController@edit');
Route::post('cargo/ubah/{id}','cargoController@update');
Route::delete('cargo/{id}','cargoController@destroy');

Route::get('cargo/arrival', 'cargoController@arrival');
Route::get('cargo/departure', 'cargoController@departure');
Route::post('cargo/date/', 'cargoController@date');
