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
Route::get('proveedores/lista', 'PrincipalController@lista')->name('lista');
Route::get('proveedores/estado/{id}/{est}', 'PrincipalController@estado')->name('estado');
Route::resource('proveedores', 'PrincipalController');

Route::get('/', function () {
    return view('auth/login');    
});

Route::get('/elvis', function () {    
    return view('elvis');       
});

Route::get('/luz', function () {
    return view('luz');
});
Route::get('/silva', function () {
    return view('silva');
});

Route::get('/pinchao', function () {
    return view('pinchao');
});

Route::get('/inicio', function () {
    return view('layouts/inicio');
});

Route::get('/a', function () {    
    return view('a');       
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
