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

$router->group(['prefix' => 'api'], function () use($router){
    $router->get('/office_entity_types', 'OfficeEntityTypeController@index');
    $router->get('/office_entity_type/{id}','OfficeEntityTypeController@show');
    $router->post('/office_entity_type/create', 'OfficeEntityTypeController@create');
    $router->put('/office_entity_type/update/{id}', 'OfficeEntityTypeController@update');
    $router->delete('/office_entity_type/delete/{id}', 'OfficeEntityTypeController@delete');

    $router->get('/office_entities/', 'OfficeEntityController@index');
    $router->get('/office_entity/{id}', 'OfficeEntityController@show');
    $router->post('/office_entity/create', 'OfficeEntityController@create');
    $router->put('/office_entity/update/{id}', 'OfficeEntityController@update');
    $router->delete('/office_entity/delete/{id}', 'OfficeEntityController@delete');


});


