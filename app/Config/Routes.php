<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Define routes for the Home controller
$routes->get('/', 'Home::index');
$routes->post('/registration', 'Home::registration');
$routes->get('/registration', 'Home::registration');

$routes->post('/login', 'Home::login');
$routes->get('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->get('/dashboard', 'Home::dashboard');
$routes->post('/home', 'Home::home');
$routes->get('/users_data', 'Home::users_data');
$routes->post('/edit/(:num)', 'Home::edit/$1');
//$routes->post('/edit/(:num)', 'Home::edit/$1');
$routes->post('/update/(:num)', 'Home::update/$1');
$routes->post('/delete/(:num)', 'Home::delete/$1');
$routes->get('/delete/(:num)', 'Home::delete/$1');
$routes->get('/upload', 'Home::upload');
$routes->post('/upload', 'Home::upload');
$routes->get('/profile', 'Home::profile');
$routes->get('/profileUpdate', 'Home::profileUpdate');
$routes->post('/profileUpdate', 'Home::profileUpdate');
$routes->get('/change_password', 'Home::change_password');
$routes->post('/change_password', 'Home::change_password');
$routes->get('/about_us', 'Home::about_us');
$routes->get('/contact', 'Home::contact');




