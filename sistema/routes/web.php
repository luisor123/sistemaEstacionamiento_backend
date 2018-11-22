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
    return redirect('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('propietario', 'PropietarioController');
    Route::resource('vehiculo', 'VehiculoController');
    
    Route::resource('estacionamiento', 'EstacionamientoController');
    Route::resource('espacio-estacionamiento', 'EspacioEstacionamientoController');
    Route::resource('detalle-estacionamiento', 'DetalleEstacionamientoController');
    
});
