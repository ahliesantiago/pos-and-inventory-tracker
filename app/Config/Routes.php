<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/items/(:item_id)', 'ItemController::view/$1');
$routes->get('/items/new', 'ItemController::new');
$routes->post('/items/create', 'ItemController::create');
$routes->get('/items/search/(:any)', 'ItemController::search/$1');
$routes->get('/cart/current', 'CartController::show_open_cart');
$routes->post('/cart/add', 'CartController::add_to_cart');
$routes->post('/cart/(:any)/edit_qty/(:any)', 'CartController::edit_item_quantity/$1/$2');
$routes->post('/cart/(:any)/delete_item/(:any)', 'CartController::delete_item/$1/$2');
// $routes->get('/cart/checkout', 'CartController::checkout');
