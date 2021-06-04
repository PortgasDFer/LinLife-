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


Route::get('/','PaginasController@index')->name('inicio');
Route::get('/catalogo','PaginasController@catalogo')->name('catalogo');
Route::get('/detalle/{producto}','PaginasController@detalle')->name('detalle');
Route::get('/contacto','PaginasController@contacto');
Route::post('/mensaje','PaginasController@mensaje');

Route::get('/registro',function(){
	return view('UsrInterfaces.registro');
});
Route::get('/iniciar',function(){
	return view('UsrInterfaces.login');
});

Route::get('/previa', function(){
	return view('UsrInterfaces.failed');
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
Route::get('/usuariosverificados','UsersController@verificados')->name('/usuarios-verificados');
Route::get('/usuarioverificado/{usuario}','UsersController@usuarioverificado')->name('/usuario-verificado');
Route::get('/verificar/{usuario}','UsersController@verificarUsuario')->name('verificar.usuario');
Route::post('/status/{usuario}','UsersController@statusCuenta')->name('status.usuario');
Route::get('/subir-identificacion','UsersController@subirIdentificacion')->name('subir.identificación');
Route::post('/guardarineReverso/{usuario}','UsersController@atras')->name('identificacion.atras');
Route::post('/guardarine/{usuario}','UsersController@guardarIne')->name('guardar.ine');
Route::get('/desglose/{usuario}','UsersController@desglose')->name('usuario.desglose');
Route::get('/semana/{usuario}','UsersController@semana')->name('usuario.semana');
Route::get('/mes/{usuario}','UsersController@mes')->name('usuario.mes');
Auth::routes(['verify' => true]);
Route::get('/validar-codigo/{usuario}','UsersController@validarCodigo')->name('usuario.validar');
Route::resource('/promociones','PromocionesController');
Route::get('/obtenerPromocion/{producto}','PromocionesController@obtenerDatos')->name('obtener.producto');
Route::get('/obtenerPromos','PromocionesController@datatable')->name('datatable.promociones');
Route::post('/promocion','PedidosController@registroPromocion')->name('registrofila.promocion');
Route::delete('/pedidos-promocion/{promocion}','PedidosController@eliminarPromocion')->name('eliminar.promocion');


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
Route::get('/historial','VentasController@historial')->name('historial.compras');

Route::get('/obtenerDomicilios','DomicilioController@datatable')->name('datatable.domicilio');

Route::resource('/pedidos','PedidosController');
Route::get('/promociones-del-mes','PromocionesController@promocionesMes')->name('promociones.mes');
Route::get('/pedido/{venta}','PedidosController@detallePedido')->name('detalle.pedido');
Route::get('/imprimir/{venta}','PedidosController@imprimir')->name('detalle.imprimir');
Route::get('/indexventas/','VentasController@indventas')->name('ventas.indexof');


Route::resource('/ventas','VentasController');
Route::post('/ventas-promocion','VentasController@promocion')->name('ventas.promocion');
Route::get('/listado-de-ventas','VentasController@ventas')->name('listado.ventas');
Route::get('/detalle-venta/{venta}','VentasController@detalleVenta')->name('detalle.venta');
Route::get('/detalle-ventapromocion/{venta}','VentasController@detalleVentapromocion')->name('detalle.ventaspromocion');
Route::get('/obtenerVentas','VentasController@datatable')->name('datatable.ventas');


Route::get('/pedidos-automaticos','PedidosController@automaticos')->name('pedidos.automaticos');
Route::get('/cobros-sobre-comisiones','PedidosController@cobrosComisiones')->name('cobros.comisiones');


//PayPal
Route::post('/pay/{venta}','PaymentController@payWithPayPal')->name('pay.paypal');

Route::post('/paypal/status','PaymentController@payPalStatus')->name('paypal.status');

//Carrito
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::post('/cart-agregar', 'CartController@agregar')->name('cart.agregar');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::post('/cart-removeitem', 'CartController@removeitem')->name('cart.removeitem');
Route::get('/cart-clear', 'CartController@clear')->name('cart.clear');
Route::post('/cart-actualizar', 'CartController@actualizar')->name('cart.actualizar');
Route::get('/cart.procesopedido','CartController@procesopedido')->name('cart.procesopedido');
Route::get('/revisar', 'CartController@revisar')->name('cart.revisar');

Route::get('/paypal/status','PaymentController@payPalStatus')->name('paypal.status');
Route::get('/paypal/failed','PaymentController@payPalFail')->name('paypal.fail');
Route::get('/paypal/ok','PaymentController@payPalOk')->name('paypal.ok');
Route::post('/insertarCarrito/{venta}','PaymentController@insertarCarrito')->name('insertar.carrito');

//Comisiones
Route::post('/asignarComision/{venta}','ComisionesController@asignar')->name('asignar.comision');
Route::post('/grafica','ComisionesController@all')->name('grafica.all');
Route::get('/lista-comisiones','ComisionesController@listaComisiones')->name('lista.comisiones');
Route::get('/revisar-pago-comision/{usuario}','ComisionesController@revisarComision')->name('revisar.comision');