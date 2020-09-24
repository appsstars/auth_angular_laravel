<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@signup');
    Route::resource('tipo_documento','TipoDocumentoController');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
       

        //dashboard
        Route::resource('usuario','UsuarioController');
        Route::resource('rol','RolController');
        Route::resource('horariodisponible','HorarioDisponibleController');
        Route::resource('asistencia','AsistenciaController');
        Route::resource('rutina','RutinaController');
        Route::get('rutina/details/{id_rutina}','RutinaController@details');
        Route::resource('categoria','CategoriaController');

    });
});
