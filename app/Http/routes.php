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

$app->get('/', function () use ($app) {
    return view('welcome');
});

$app->post('home', [
    'as' => 'home',
    'uses' => 'HomeController@index',
    'middleware' => 'auth'
]);

$app->get('login/{provider}', [
    'uses' => 'AuthController@doSocial',
    'as'   => 'social.login'
]);

$app->get('/key', function() {
    return str_random(32);
});

