<?php

//Rutas para iniciar sesión

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



//Usuarios
Route::get('/crudusers', 'Coordinador\UserController@index')
    ->name('crudusers.index')->middleware('auth');

Route::get('/crudusers/nuevo', 'Coordinador\UserController@create')->name('crudusers.create')->middleware('auth');

Route::post('/crudusers', 'Coordinador\UserController@store')->middleware('auth');

Route::get('/crudusers/{user}/editar', 'Coordinador\UserController@edit')->name('crudusers.edit')->middleware('auth');

Route::put('/crudusers/{user}', 'Coordinador\UserController@update')->middleware('auth');;

Route::delete('/crudusers/{user}', 'Coordinador\UserController@destroy')->name('crudusers.destroy')->middleware('auth');

Route::get('/crudusers/habilitar/{user}' , 'Coordinador\UserController@habilitar');

Route::get('/crudusers/deshabilitar/{user}' , 'Coordinador\UserController@deshabilitar');



//Rutas para lugares
Route::get('/crudlugares', 'Coordinador\LugaresController@index')
    ->name('crudlugares.index')->middleware('auth');

Route::get('/crudlugares/nuevo', 'Coordinador\LugaresController@create')->name('crudlugares.create')->middleware('auth');

Route::post('/crudlugares', 'Coordinador\LugaresController@store')->middleware('auth');;

Route::get('/crudlugares/{lugares}/editar', 'Coordinador\LugaresController@edit')->name('crudlugares.edit')->middleware('auth');

Route::put('/crudlugares/{lugares}', 'Coordinador\LugaresController@update')->middleware('auth');

Route::delete('/crudlugares/{lugares}', 'Coordinador\LugaresController@destroy')->name('crudlugares.destroy')->middleware('auth');



//Rutas para tramites
Route::get('/crudtramites', 'Coordinador\TramitesController@index')
    ->name('crudtramites.index')->middleware('auth');

Route::get('/crudtramites/nuevo', 'Coordinador\TramitesController@create')->name('crudtramites.create')->middleware('auth');

Route::post('/crudtramites', 'Coordinador\TramitesController@store')->middleware('auth');

Route::get('/crudtramites/{tramite}/editar', 'Coordinador\TramitesController@edit')->name('crudtramites.edit')->middleware('auth');

Route::put('/crudtramites/{tramite}', 'Coordinador\TramitesController@update')->middleware('auth');

Route::delete('/crudtramites/{tramite}', 'Coordinador\TramitesController@destroy')->name('crudtramites.destroy')->middleware('auth');

Route::get('/crudtramites/cambiar/{tramite}' , 'Coordinador\TramitesController@deshabilitar')->middleware('auth');

Route::get('/crudtramites/deshabilitar/{tramite}' , 'Coordinador\TramitesController@cambiar')->middleware('auth');


Route::get('/crudtramites/ver/{tramite}' , 'Coordinador\TramitesController@ver')->middleware('auth');



//Rutas para historico
Route::get('/crudseguimiento', 'Coordinador\SeguimientoController@index')
    ->name('crudseguimiento.index')->middleware('auth');

Route::delete('/crudseguimiento/{seguimiento}', 'Coordinador\SeguimientoController@destroy')->name('crudseguimiento.destroy')->middleware('auth');



//Rutas para tramites secretaria
Route::get('/crudsecretramites', 'Coordinador\TramiteSeController@index')
    ->name('crudsecretramites.index')->middleware('auth');

Route::get('/crudsecretramites/nuevo', 'Coordinador\TramiteSeController@create')->name('crudsecretramites.create')->middleware('auth');

Route::post('/crudsecretramites', 'Coordinador\TramiteSeController@store')->middleware('auth');

Route::get('/crudsecretramites/{tramite}/editar', 'Coordinador\TramiteSeController@edit')->name('crudsecretramites.edit')->middleware('auth');

Route::put('/crudsecretramites/{tramite}', 'Coordinador\TramiteSeController@update')->middleware('auth');

Route::delete('/crudsecretramites/{tramite}', 'Coordinador\TramiteSeController@destroy')->name('crudsecretramites.destroy')->middleware('auth');

Route::get('/crudsecretramites/cambiar/{tramite}' , 'Coordinador\TramiteSeController@deshabilitar')->middleware('auth');

Route::get('/crudsecretramites/deshabilitar/{tramite}' , 'Coordinador\TramiteSeController@cambiar')->middleware('auth');

Route::get('/crudsecretramites/ver/{tramite}' , 'Coordinador\TramiteSeController@ver')->middleware('auth');
