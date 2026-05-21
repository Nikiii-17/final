<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'JednaTabulka::index');
$routes->get('dva/(:any)', 'DvaProklik::index/$1');
