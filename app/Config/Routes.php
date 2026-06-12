<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'JednaTabulka::index');
$routes->get('edit/(:num)', 'JednaTabulka::edit/$1');    
$routes->post('update/(:num)', 'JednaTabulka::update/$1'); 
$routes->get('dva/(:num)', 'DvaProklik::index/$1');
