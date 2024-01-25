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

//Route::get('/', function () {
//    return view('layouts.app');
//})->name('home')->middleware('auth');
Route::get('/', 'HomeController@inicio')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {

Route::resources([
    'categorias' => 'CategoriaController',
    'laboratorios' => 'LaboratorioController',
    'formas' => 'FormaController',
    'farmacos' => 'FarmacoController',
    'tipos' => 'TipoProductoController',
    'proveedors' => 'ProveedorController',
    'productos' => 'ProductoController',
    'salida' => 'SalidaController',
    'ingreso' => 'IngresoController',
    'almacen' => 'AlmacenController',
    'lote' => 'LoteController',
    'usuario' => 'UsuarioController',
]);

Route::get('/obtener_productos/{id}', 'SalidaController@obtenerProductos');
Route::post('/getProductos', 'SalidaController@getProductos');
Route::get('/reporte', 'ReporteController@inventario')->name('reporte');

Route::post('/guardarLotes', 'IngresoController@guardarLotes');
Route::post('/guardarLotesSalida', 'SalidaController@guardarLotes');
});
Route::get('login', 'Auth\LoginController@guest')->name('login');
Route::post('login', 'Auth\LoginController@postLogin')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/income/year', 'GraphController@get_bar_chart');
