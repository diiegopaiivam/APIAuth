<?php

use Illuminate\Http\Request;

//Token de Login
Route::post('auth/login', 'Api\AuthController@login');
Route::post('auth/refresh', 'Api\AuthController@refresh');
Route::post('auth/logout', 'Api\AuthController@logout');
Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api\\'], function() {
    Route::get('auth/me', 'AuthController@me');
});

//Cadastro de Eventos

Route::post('auth/cadastrar','Api\EventosController@cadastrar');
Route::get('auth/index', 'Api\EventosController@index');