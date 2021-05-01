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
Route::get('/ingreso-de-producto','ProductosController@ingreso')->name('ingreso.producto');
Route::get('/existencias','ProductosController@existencias')->name('existencias.productos');
Route::get('/obtenerExistencias','ProductosController@existenciasTable')->name('existencias.table');
Route::get('/obtenerProducto/{producto}','ProductosController@obtenerDatos')->name('obtener.producto');
Route::post('/entrada','ProductosController@entradaMercancia')->name('entrada.mercancia');
Route::get('/obtenerUsers','UsersController@datatable')->name('datatable.user');
Route::resource('/usuarios','UsersController');
Route::post('/invitar-usuarios','UsersController@invitar')->name('invitar.usuarios');
Route::get('/validar-identidades','UsersController@identificaciones')->name('validar-identidades');
Route::get('/verificar/{usuario}','UsersController@verificarUsuario')->name('verificar.usuario');
Route::post('/status/{usuario}','UsersController@statusCuenta')->name('status.usuario');
Route::get('/subir-identificacion','UsersController@subirIdentificacion')->name('subir.identificación');
Route::post('/guardarine/{usuario}','UsersController@guardarIne')->name('guardar.ine');
Auth::routes(['verify' => true]);
Route::get('/validar-codigo/{usuario}','UsersController@validarCodigo')->name('usuario.validar');
Route::resource('/promociones','PromocionesController');
Route::get('/obtenerPromos','PromocionesController@datatable')->name('datatable.promociones');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/micuenta/{usuario}','CuentaController@detallesCuenta')->name('cuenta.usuario');
Route::get('/estructura-de-red/{usuario}','CuentaController@miEstructura')->name('estructura.usuario');
Route::get('/lista-de-red/{usuario}','CuentaController@miLista')->name('lista.usuario');
Route::resource('/cuenta','CuentaController');
Route::resource('/domicilios','DomicilioController');
Route::post('/tel/{user}', 'CuentaController@telefonos')->name('tel');
Route::post('/datos/{user}', 'CuentaController@datospersonales')->name('datos');
Route::post('/contra/{user}', 'CuentaController@contraseña')->name('contra');
Route::post('/fac/{user}', 'CuentaController@facturacion')->name('fac');
Route::post('/fotoperfil/{user}', 'CuentaController@foto')->name('fotoperfil');

Route::get('/obtenerDomicilios','DomicilioController@datatable')->name('datatable.domicilio');

Route::resource('/pedidos','PedidosController');
Route::get('/pre-pedido','PedidosController@prepedido');

Route::resource('/dvp','DvpController');
Route::resource('/ventas','VentasController');
Route::get('/listado-de-ventas','VentasController@ventas')->name('listado.ventas');
Route::get('/detalle-venta/{venta}','VentasController@detalleVenta')->name('detalle.venta');
Route::get('/obtenerVentas','VentasController@datatable')->name('datatable.ventas');


Route::get('/pedidos-automaticos','PedidosController@automaticos')->name('pedidos.automaticos');
Route::get('/cobros-sobre-comisiones','PedidosController@cobrosComisiones')->name('cobros.comisiones');
