<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::view('/','welcome')->name('inicio');


Route::resource('clientes',ClienteController::class);
Route::resource('servicios',ServicioController::class);
Route::get('/ControlClientes','NavController@index' )->name('clientes');
Route::get('/ControlServicios','NavController@ControlServicios' )->name('servicios');
Route::get('/detalles/{cliente}','NavController@ClienteDetalle' )->name('cliente');
