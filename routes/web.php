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



Route::get('/obtenerProductos','ProductosController@datatable')->name('datatable.producto');
Route::resource('/productos','ProductosController');

Route::get('/obtenerUsers','UsersController@datatable')->name('datatable.user');
Route::resource('/usuarios','UsersController');
Route::get('/validar-identidades','UsersController@identificaciones')->name('validar-identidades');
Route::get('/verificar/{usuario}','UsersController@verificarUsuario')->name('verificar.usuario');
Route::post('/status/{usuario}','UsersController@statusCuenta')->name('status.usuario');
Route::get('/subir-identificacion','UsersController@subirIdentificacion')->name('subir.identificación');
Route::post('/guardarine/{usuario}','UsersController@guardarIne')->name('guardar.ine');
Auth::routes();
Route::get('/validar-codigo/{usuario}','UsersController@validarCodigo')->name('usuario.validar');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/micuenta/{usuario}','CuentaController@detallesCuenta')->name('cuenta.usuario');
Route::get('/estructura-de-red/{usuario}','CuentaController@miEstructura')->name('estructura.usuario');
Route::resource('/cuenta','CuentaController');
Route::resource('/domicilios','DomicilioController');
Route::post('/tel/{user}', 'CuentaController@telefonos')->name('tel');
Route::post('/datos/{user}', 'CuentaController@datospersonales')->name('datos');
Route::post('/contra/{user}', 'CuentaController@contraseña')->name('contra');
Route::post('/fac/{user}', 'CuentaController@facturacion')->name('fac');
Route::post('/fotoperfil/{user}', 'CuentaController@foto')->name('fotoperfil');

Route::get('/obtenerDomicilios','DomiciliosController@datatable')->name('datatable.domicilio');

