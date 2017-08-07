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

Route::get('/', function () {
    return view('auth/login');
});


Route::resource('almacen/categoria',    'categoriaCtrl');
Route::resource('almacen/articulo',     'articuloCtrl');
Route::resource('ventas/cliente',       'clienteCtrl');
Route::resource('ventas/venta',         'ventaCtrl');
Route::resource('compras/proveedor',    'proveedorCtrl');
Route::resource('compras/ingreso',      'ingresoCtrl');
Route::resource('seguridad/usuario',    'userCtrl');
Route::get('/{slug?}', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
