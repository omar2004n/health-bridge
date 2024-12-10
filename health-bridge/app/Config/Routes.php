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
// app/Config/Routes.php

    $routes->get('appointments', 'Admin::appointments');


$routes->post('/book', 'AppointmentController::book');
//confirm appointements 

$routes->post('/admin/confirm_appointment', 'Admin::confirmAppointment');
//cancel appoitement

$routes->post('/admin/cancel_appointment', 'Admin::cancelAppointment');


// Routes for CRUD operations

$routes->get('/admin-patients', 'PatientController::index');
$routes->post('/admin-patients/add', 'PatientController::add');
$routes->post('/admin-patients/update/(:num)', 'PatientController::update/$1');
$routes->post('/admin-patients/delete/(:num)', 'PatientController::delete/$1');

//doctor operation
$routes->post('/admin-doctors/update', 'DoctorController::update');
$routes->post('/admin-doctors/add', 'DoctorController::add');
$routes->delete('/admin-doctors/delete/(:num)', 'DoctorController::delete/$1');
$routes->get('/admin-doctors', 'Admin::doctors');





$routes->get('admin-dashboard', 'Admin::dashboard');

$routes->get('admin-appointments', 'Admin::appointments');
$routes->get('admin-doctors', 'Admin::doctors');
$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/profile', 'ProfileController::index');
$routes->post('/profile/update', 'ProfileController::update');

$routes->get('/settings', 'PatientSettingsController::index');
$routes->post('/settings/update', 'PatientSettingsController::update');

$routes->get('/contacts', 'ContactController::index');
$routes->post('/contacts/submit', 'ContactController::submit');
