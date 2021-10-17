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

Route::get('/', 'GruposController@index')->name('inicio');
Route::get('/viewestudiantes' , 'EstudiantesController@index')->name('viewestudiantes');

Route::post('/agregar', 'GruposController@store')->name('store');
Route::post('/agregarest', 'EstudiantesController@store')->name('storeest');

Route::get('/editar/{id}', 'GruposController@edit')->name('editar');
Route::get('/editarest/{id}', 'EstudiantesController@edit')->name('editarest');

Route::put('/update/{id}', 'GruposController@update')->name('update');
Route::put('/updateest/{id}', 'EstudiantesController@update')->name('updateest');


Route::delete('/eliminar/{id}', 'GruposController@destroy')->name('eliminar');
Route::delete('/eliminarest/{id}', 'EstudiantesController@destroy')->name('eliminarest');
