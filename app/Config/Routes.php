<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('product', ['controller' => 'ProductController', 'filter' => 'cors', 'placeholder' => '(:num)']);
