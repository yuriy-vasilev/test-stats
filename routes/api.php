<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->get('add/{countryCode}', ['uses' => 'Controller@add']);
$router->get('list', ['uses' => 'Controller@list']);
