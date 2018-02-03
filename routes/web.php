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

Route::get('/', 'HomeController@index');

Route::get('/temporales','TemporalesController@index')->name('temporales');
Route::post('/temporales/store','TemporalesController@store')->name('temporales.store');
Route::get('/temporales/show/{id}','TemporalesController@show')->name('temporales.show');
Route::post('/temporales/update','TemporalesController@update')->name('temporales.update');
Route::post('/temporales/disable','TemporalesController@disable')->name('temporales.disable');

Route::get('/listas','ListasController@index')->name('listas');
Route::post('/listas/store','ListasController@store')->name('listas.store');
Route::get('/listas/admin/{id}','ListasController@admin')->name('listas.admin');

Route::post('/asistencias/store','AsistenciasController@store')->name('asistencias.store');
Route::post('/asistencias/check','AsistenciasController@check')->name('asistencias.check');
Route::post('/asistencias/in','AsistenciasController@in')->name('asistencias.in');
Route::post('/asistencias/out','AsistenciasController@out')->name('asistencias.out');

Route::get('/reportes', 'ReportesController@index')->name('reportes');
Route::post('/reportes/generate', 'ReportesController@generate')->name('reportes.generate');
Route::get('/reportes/generate', 'ReportesController@generate')->name('reportes.generate');

Route::get('/reporte_asistencias/{fi}/{ff}',['as' => 'reporte.asistencias', 'uses' => 'ExcelController@range']);

//Route::resource('excel','ExcelController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
