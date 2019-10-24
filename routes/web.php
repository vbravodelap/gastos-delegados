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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Solicitudes
Route::get('request/create', 'RequestController@create')->name('request.create');
Route::post('request/store', 'RequestController@store')->name('request.store');
Route::get('request/pendientes', 'RequestController@solicitudesPendientes')->name('request.pendientes');
Route::get('request/aprobadas', 'RequestController@solicitudesAprobadas')->name('request.aprobadas');
Route::get('request/autorizar', 'RequestController@autorizarSolicitudes')->name('request.autorizar');
