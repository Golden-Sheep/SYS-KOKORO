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



Auth::routes();
Route::put('/usuario/cadastro', 'UsuarioController@cadastro');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'UsuarioController@index');
Route::get('/usuario', 'UsuarioController@index');
Route::get('/usuario/pendente', 'UsuarioController@viewUsuariosPedentes');
Route::get('/usuario/editar/{id}', 'UsuarioController@viewEditarUsuario');
Route::put(' /usuario/editar/{id}/confirmar', 'UsuarioController@atualizar');


    Route::get('/usuario/buscardados', 'UsuarioController@buscarDadosUsuario')->name('buscarDadosUsuario');
});
