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
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tel/{{id}}', 'CuentaController@telefonos')->name('tel');


