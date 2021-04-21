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

Route::get('/', function () {
    return view('inicio');
});
Route::get('/catalogo', function () {
    return view('ShpInterfaces.catalogo');
});
Route::get('/registro',function(){
	return view('UsrInterfaces.registro');
});
Route::get('/iniciar',function(){
	return view('UsrInterfaces.login');
});
Route::get('/cuenta',function(){
	return view('UsrInterfaces.cuenta');
});


Route::get('/obtenerProductos','ProductosController@datatable')->name('datatable.producto');
Route::resource('/productos','ProductosController');

Route::get('/obtenerUsers','UsersController@datatable')->name('datatable.user');
Route::resource('/usuarios','UsersController');
Route::get('/validar-identidades','UsersController@identificaciones')->name('validar-identidades');
Route::get('/verificar/{usuario}','UsersController@verificarUsuario')->name('verificar.usuario');
Route::post('/status/{usuario}','UsersController@statusCuenta')->name('status.usuario');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/cuenta','CuentaController');
Route::post('/tel/{user}', 'CuentaController@telefonos')->name('tel');


