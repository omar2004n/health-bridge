<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/store', 'Auth::store');
$routes->get('logout', 'Auth::logout');

$routes->get('book-appointment', 'AppointmentController::index');
$routes->post('book-appointment', 'AppointmentController::book');


