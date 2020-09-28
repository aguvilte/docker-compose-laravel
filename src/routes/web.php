<?php

Auth::routes(['verify' => false]);
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
Route::group(['prefix' => 'personas'], function(){
    Route::get('/', 'PersonasRobadasController@index')->name('indexPersona');
    Route::get('/create', 'PersonasRobadasController@create');
    Route::post('/save', 'PersonasRobadasController@save');
    Route::get('/edit/{id}', 'PersonasRobadasController@edit');
    Route::put('/update/{id}', 'PersonasRobadasController@update');
});

