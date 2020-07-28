<?php

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/listCars', ['uses' => 'CarController@listCars']);
    $router->get('/listCars/', ['uses' => 'CarController@listCars']);

    $router->post('/createCar', ['uses' => 'CarController@createCar']);
    $router->post('/createCar/', ['uses' => 'CarController@createCar']);

    $router->get('/logs', ['uses' => 'LogController@get_logs']);
    $router->get('/logs/', ['uses' => 'LogController@get_logs']);

});