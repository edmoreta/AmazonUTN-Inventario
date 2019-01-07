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
    Route::resource('usuarios', 'UserController')->middleware('role:administrador');
    Route::get('categorias/search','CategoriaController@search');
    Route::resource('categorias', 'CategoriaController');        
    Route::resource('documentos', 'DocumentoController');
    Route::resource('ajustes', 'AjustesController');
    Route::resource('notas_de_credito', 'NotasDeCreditoController');
    Route::resource('facturas_ingreso', 'FacturaIngresoController');
    
    Route::get('/inicio', function () {
        return view('layouts/inicio');
    });
    
});