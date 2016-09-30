<?php

/*
|--------------------------------------------------------------------------
| Rotas de aplicação
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar todas as rotas para um aplicativo.
| É uma brisa. Basta dizer Laravel os URIs que deve responder a
| e dar-lhe o controlador para chamar quando o URI é solicitada.
|
*/
Route::get('/estados','JqueryController@jquery');
Route::get('/estados/{id}','JqueryController@cidades');
Route::POST('/cadastrar-cidade','JqueryController@cadastrarCidade'); 
Route::get('/editar-cidade/{id}','JqueryController@edit'); 
Route::POST('/editar-cidade/{id}','JqueryController@editGo'); 

Route::GET('/deletar-cidade/{id}','JqueryController@delete'); 

Route::get('/cadastro-jquery','JqueryController@formulario');
Route::POST('/cadastro-jquery','JqueryController@cadastrar');

Route::get('/',function(){
	return view('welcome');
});
