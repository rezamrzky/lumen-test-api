<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix'=>'api'], function() use($router){
    $router->get('/users', 'usersController@index');
    $router->post('/users', 'usersController@create');
    $router->get('/users/{id}', 'usersController@show');
    $router->put('/users/{id}', 'usersController@update');
    $router->delete('/users/{id}', 'usersController@destroy');
    $router->post('/paging', 'usersController@paging');
});
