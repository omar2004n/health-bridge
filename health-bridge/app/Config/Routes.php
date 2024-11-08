<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index'); // Home page
$routes->get('/login', 'Auth::login'); // Login page

$routes->post('/auth/authenticate', 'Auth::authenticate'); // Handle authentication
$routes->get('/logout', 'Auth::logout'); // Handle logout

$routes->get('/register', 'Auth::register');
$routes->post('/auth/store', 'Auth::store');


