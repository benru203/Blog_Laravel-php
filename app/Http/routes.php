<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('Admin.auth.login');
});

Route::group(['prefix'=>'Admin','middleware'=>'auth'],function(){

	Route::get('/',['as'=>'Admin.index', function () {
		return view('Admin.Template.main');
	}]);


	Route::resource('Users','UsersController');
	Route::get('Users/{id}/destroy',[
		'uses'=>'UsersController@destroy',
		'as'=>'Admin.Users.destroy'
	]);

	Route::resource('Categorias','CategoriasController');
	Route::get('Categorias/{id}/destroy',[
		'uses'=>'CategoriasController@destroy',
		'as'=>'Admin.Categorias.destroy'
	]);

	Route::resource('Etiquetas','EtiquetasController');
	Route::get('Etiquetas/{id}/destroy',[
		'uses'=>'EtiquetasController@destroy',
		'as'=>'Admin.Etiquetas.destroy'
	]);

	Route::resource('Articulos','ArticulosController');
	Route::get('Articulos/{id}/destroy',[
		'uses'=>'ArticulosController@destroy',
		'as'=>'Admin.Articulos.destroy'
	]);

});

//Rutas de autenticacion del login
Route::get('Admin/auth/login',[
	'uses' =>  'Auth\AuthController@getLogin',
	'as' => 'Admin.auth.login'
]);
Route::post('Admin/auth/login',[
	'uses' =>  'Auth\AuthController@postLogin',
	'as' => 'Admin.auth.login'
]);
Route::get('Admin/auth/logout',[
	'uses' =>  'Auth\AuthController@getLogout',
	'as' => 'Admin.auth.logout'
]);

