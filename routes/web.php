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

$router->get('/', function () use ($router) {

    return $router->app->version();

});

$router->group(['prefix' => 'auth'], function ($router) {

    $router->post('login', 'auth\AuthController@login');


    $router->post('register', "auth\RegisterController@register");

});

$router->group(['middleware' => 'auth:api'], function ($router) {

    $router->group(['prefix' => 'users'], function ($router) {
        $router->post('edit', 'UsersController@edit');
        $router->post('changepassword', 'UsersController@updatepassword');
        $router->get('show', 'UsersController@profile');
        $router->post('logout', 'auth\AuthController@logout');
        $router->get('index', 'UsersController@listUsers');
    });

});

$router->post('/resetpassword', 'Auth\ResetPassword@reset');