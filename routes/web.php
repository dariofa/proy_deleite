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

 Route::post('users/store',[
	'uses' => 'UsersController@store',
	'as'=>'admin.users.store'
	]);


Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

	//Administracion de users
   


	//Administracion de productos bodega
	Route::get('bodega/producto/','ProductosBodegaController@index');
	Route::get('bodega/producto/crear','ProductosBodegaController@create');
	Route::get('bodega/producto/edit/{id}','ProductosBodegaController@edit');
	Route::get('bodega/producto/delete/{id}','ProductosBodegaController@destroy');
	Route::post('bodega/producto/store',[
	'uses' => 'ProductosBodegaController@store',
	'as'=>'admin.bodega.producto.store'
	]);
	Route::post('bodega/producto/update/{id}',[
	'uses' => 'ProductosBodegaController@update',
	'as'=>'admin.bodega.producto.update'
	]);
	Route::post('bodega/producto/stock/update',[
	'uses' => 'ProductosBodegaController@stockUpdate',
	'as'=>'admin.bodega.producto.stock.update'
	]);
	Route::post('bodega/producto/search','ProductosBodegaController@search');

	//Administracion de recetas
	Route::get('/recetas/','RecetasController@index');
	Route::get('/recetas/create','RecetasController@create');
	Route::get('/recetas/delete/{id}','RecetasController@destroy');
	Route::get('/recetas/edit/{id}','RecetasController@edit');
	Route::get('/recetas/producto/delete/{id_rec}/{id_pro}','RecetasController@prodDelete');
	Route::post('recetas/store',[
	'uses' => 'RecetasController@store',
	'as'=>'admin.recetas.store'
	]);
	Route::post('recetas/update/{id}',[
	'uses' => 'RecetasController@update',
	'as'=>'admin.recetas.update'
	]);
	Route::post('/receta/producto/update',[
	'uses' => 'RecetasController@productUpdate',
	'as'=>'admin.recetas.product.update'
	]);
	Route::post('/receta/producto/add',[
	'uses' => 'RecetasController@productAdd',
	'as'=>'admin.recetas.product.add'
	]);

	//Tienda-productos
	Route::get('/tienda/','ProductosTiendaController@index');
	Route::get('/tienda/producto/edit/{id}','ProductosTiendaController@edit');
	Route::get('/tienda/producto/delete/{id}','ProductosTiendaController@destroy');
	Route::get('/tienda/producto/create','ProductosTiendaController@create');
	Route::post('tienda/producto/store',[
	'uses' => 'ProductosTiendaController@store',
	'as'=>'admin.tienda.producto.store'
	]);
	Route::post('/tienda/producto/add/stock',[
	'uses' => 'ProductosTiendaController@addStock',
	'as'=>'admin.tienda.producto.add.stock'
	]);
	Route::post('tienda/producto/update/{id}',[
	'uses' => 'ProductosTiendaController@update',
	'as'=>'admin.tienda.producto.update'
	]);
	Route::post('tienda/producto/search',[
	'uses' => 'ProductosTiendaController@search',
	'as'=>'admin.tienda.producto.search'
	]);

	Route::post('tienda/producto/find/',[
	'uses' => 'ProductosTiendaController@find',
	'as'=>'admin.tienda.producto.find'
	]);


	Route::get('/tienda/pedidos/','PedidosController@index');
	Route::get('/tienda/pedidos/edit/{id}','PedidosController@edit');
	Route::get('/tienda/pedidos/delete/{id}','PedidosController@destroy');
	Route::get('/tienda/pedidos/create/{id}','PedidosController@create');
	Route::get('/tienda/pedidos/edit/{id}','PedidosController@edit');
	Route::get('/tienda/pedidos/view/{id}','PedidosController@show');
	Route::get('/tienda/pedido/producto/delete/{id_pro}/{id_ped}','PedidosController@destroyProd');
	Route::post('tienda/pedidos/store',[
	'uses' => 'PedidosController@store',
	'as'=>'admin.tienda.pedidos.store'
	]);
	Route::post('/tienda/pedido/product/update',[
	'uses' => 'PedidosController@updateProduct',
	'as'=>'admin.tienda.pedido.product.update'
	]);
	Route::post('/tienda/pedido/product/add',[
	'uses' => 'PedidosController@addProduct',
	'as'=>'admin.tienda.pedido.product.add'
	]);
	Route::post('/tienda/pedido/deliver/',[
	'uses' => 'PedidosController@deliver',
	'as'=>'admin.tienda.pedido.deliver'
	]);

	//Administracion de clientes
	Route::get('/clientes/','ClientesController@index');
	Route::get('/clientes/create','ClientesController@create');
	Route::get('/clientes/delete/{id}','ClientesController@destroy');
	Route::get('/clientes/edit/{id}','ClientesController@edit');
	Route::get('/clientes/add/{id}','ClientesController@canastillasAdd');

	Route::post('clientes/store',[
	'uses' => 'ClientesController@store',
	'as'=>'admin.clientes.store'
	]);
	Route::post('clientes/update/{id}',[
	'uses' => 'ClientesController@update',
	'as'=>'admin.clientes.update'
	]);

	Route::post('clientes/assign',[
	'uses' => 'ClientesController@assign',
	'as' => 'admin.clientes.assign'
	]);


	//Administracion de canastillas
	Route::get('/canastillas/','CanastillasController@index');
	Route::get('/canastillas/create','CanastillasController@create');
	Route::get('/canastillas/delete/{id}','CanastillasController@destroy');
	Route::get('/canastillas/edit/{id}','CanastillasController@edit');

	Route::post('canastillas/assign/',[
	'uses' => 'CanastillasController@assign',
	'as'=>'admin.canastillas.assign'
	]);

	Route::post('canastillas/store',[
	'uses' => 'CanastillasController@store',
	'as'=>'admin.canastillas.store'
	]);
	Route::post('canastillas/update/{id}',[
	'uses' => 'CanastillasController@update',
	'as'=>'admin.canastillas.update'
	]);

	//Administracion Produccion
	Route::get('/tienda/pedidos/produccion','ProduccionController@index');
	Route::post('/tienda/produccion/update/producido',[
	'uses' => 'ProduccionController@updateProducido',
	'as'=>'admin.tienda.produccion.updateProducido'
	]);

	//Administracion de caja
	Route::get('/cajas/','CajasController@index');
	Route::get('/cajas/create','CajasController@create');
	Route::get('/cajas/edit/{id}','CajasController@edit');
	Route::get('/cajas/movimientos/{id}','CajasController@showMov');
	Route::get('/cajas/delete/{id}','CajasController@destroy');
	Route::post('/cajas/store/',[
	'uses' => 'CajasController@store',
	'as'=>'admin.cajas.store'
	]);
	Route::post('cajas/update/{id}',[
	'uses' => 'CajasController@update',
	'as'=>'admin.cajas.update'
	]);

	//Egresos 
	Route::get('/cajas/otrosEgresos','OtrosEgresosCajasController@index');
	Route::get('/cajas/otrosEgresos/create','OtrosEgresosCajasController@create');
	Route::post('/cajas/otrosEgresos/store',[
	'uses' => 'OtrosEgresosCajasController@store',
	'as'=>'admin.cajas.otrosEgresos.store'
	]);

	//otros ingresos
	Route::get('/cajas/otrosIngresos','OtrosIngresosCajasController@index');
	Route::get('/cajas/otrosIngresos/create','OtrosIngresosCajasController@create');
	Route::post('/cajas/otrosIngresos/store',[
	'uses' => 'OtrosIngresosCajasController@store',
	'as'=>'admin.cajas.otrosIngresos.store'
	]);
	Route::get('/cajas/otrosIngresos/delete/{id}','OtrosIngresosCajasController@destroy');
	


});

///

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
