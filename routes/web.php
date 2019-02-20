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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(["middleware" => "auth"], function () {
    Route::get('proveedores/estado/{id}/{est}', 'ProveedoresController@estado')->name('estado');
    Route::resource('proveedores', 'ProveedoresController');
    Route::get('User/Updates', 'UserController@Updates')->name('Updates');
    Route::get('User/Config', 'UserController@Config')->name('Config');
    Route::get('User/Resend/{id}', 'UserController@passw')->name('Resend');
    Route::resource('usuarios', 'UserController')->middleware('role:administrador|root');
    Route::get('categorias/search', 'CategoriaController@search');
    Route::resource('categorias', 'CategoriaController');
    Route::get('productos/search', 'ProductoController@search');
    Route::resource('productos', 'ProductoController');
    Route::resource('documentos', 'DocumentoController');
    Route::get('stock', 'DocumentoController@stock');
    Route::get('kardex/excel', 'ReporteKardexController@reporteUsuariosExcel')->name('reporte.kardex.excel');
    Route::resource('ajustes', 'AjustesController');
    Route::resource('notas_de_credito', 'NotasDeCreditoController');
    Route::resource('facturas_ingreso', 'FacturaIngresoController');    
    Route::get('User/change_password', 'UserController@change_password')->name('change_password');
    Route::post('User/update_password', 'UserController@update_password')->name('change_password.update');
    Route::get('/inicio', function () {
        return view('layouts/inicio');
    });
});