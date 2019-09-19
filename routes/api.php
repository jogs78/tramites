<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Usuarios
Route::get('/users','Coordinador\UserController@getUsuarios');

Route::post('/users/login', 'Coordinador\UserController@login');

//Listado_lugares
Route::get('/lugares','Coordinador\LugaresController@getLugar');

//Nuevo_tramite
Route::post('/tramitar','Coordinador\TramitesController@crearTramite');

Route::get('/viewtramites','Coordinador\TramitesController@getTramites');

//Listado_de seguimientos

Route::post('/seg','Coordinador\SeguimientoController@crearSeguimiento');

Route::get('/getseg','Coordinador\SeguimientoController@getSeguimiento');
