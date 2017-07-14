<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Validação CSRF
Route::when('*', 'csrf', array('post'));

// Visitante
Route::get('/',
        array(
            'as' => 'home', 
            'uses' => 'HomeController@getIndex'
            )
        );

Route::get('entrar', 'HomeController@getEntrar');
Route::post('entrar', 'HomeController@postEntrar');
Route::get('sair', 'HomeController@getSair');
Route::post('criar', 'UsuariosController@postCriar');

// Verifica se o usuário está logado
Route::group(array('before' => 'auth'), function()
{

        Route::controller('usuarios', 'UsuariosController');
   
});