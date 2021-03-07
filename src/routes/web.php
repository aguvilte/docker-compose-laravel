<?php

Auth::routes(['verify' => true]);
Route::get('/', 'HomeController@index')->name('home');
//Esta ruta  hay que modificar a post
Route::get('/store','PatentesController@store');
/*PATENTES*/
Route::group(['prefix' => 'patentes'], function(){
    Route::get('/', 'PatentesController@index')->name('indexPatente');
    //ruta para consultar a la api
    Route::post('/subir', 'PatentesController@subir');
    Route::get('/api', 'PatentesController@api');
    //ESTA RUTA VER QUE SE QUISO HACER.
    Route::get('camera', 'PatentesController@camera');
});

/*PERSONAS*/
Route::resource('denuncias', 'DenunciaController')->except('show');
Route::get('denuncias/{id}/show', 'DenunciaController@show')->name('denuncias.show');
Route::get('denuncias/{id}/estado', 'DenunciaController@cambioEstado')->name('denuncias.estado');
/*Notificaciones*/
Route::group(['prefix' => 'notificaciones'], function () {
    Route::get('/','NotificacionesController@index')->name('indexNotificaciones');
    Route::get('/show/{id}', 'NotificacionesController@show');
    Route::get('/detalles/{id}','NotificacionesController@detalles')->name('noti-detalles');
});
Route::post('/push','PushController@store');
