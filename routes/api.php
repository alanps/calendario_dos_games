<?php

use Illuminate\Http\Request;

//Auth
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware'=>'auth:api'], function() {

	Route::get('/buscarGame', 'GameController@buscarGame');
	Route::get('/buscarGame/{game}', 'GameController@buscarGame');
	Route::post('/salvarClique/{game}', 'GameController@salvarClique');
	
});

