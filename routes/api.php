<?php

use Illuminate\Http\Request;

Route::get('appointments', 'AppointmentsController@index');
Route::get('appointments/{date}', 'AppointmentsController@get');
Route::post('appointments', 'AppointmentsController@save');
Route::put('appointments{datetime}', 'AppointmentsController@update');
Route::delete('appointments{datetime}', 'AppointmentsController@delete');