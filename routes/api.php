<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->put('/{countryCode}', ['uses' => 'Controller@update']);
$router->get('/', ['uses' => 'Controller@index']);
