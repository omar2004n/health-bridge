<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/store', 'Auth::store');
$routes->get('logout', 'Auth::logout');

// View and create appointments
$routes->get('/my_appointments', 'AppointmentController::myAppointments');
$routes->get('/new_appointment', 'AppointmentController::bookingAppointment');
$routes->post('/book', 'AppointmentController::book');





$routes->get('admin-dashboard', 'Admin::dashboard');
$routes->get('/dashboard', 'DashboardController::index');
