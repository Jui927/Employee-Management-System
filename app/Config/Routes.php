<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ----------------------------
// PUBLIC ROUTES (No login required)
// ----------------------------

$routes->get('/login', 'Auth::login');
$routes->post('/loginSubmit', 'Auth::loginSubmit');

$routes->get('/register', 'Auth::register');
$routes->post('/registerSubmit', 'Auth::registerSubmit');

$routes->get('/logout', 'Auth::logout');


// ----------------------------
// PROTECTED ROUTES (Login required)
// ----------------------------

$routes->group('', ['filter' => 'auth'], function($routes) {

    // Default homepage
    $routes->get('/', 'Employee::index');

    // Employee CRUD
    $routes->get('/employees', 'Employee::index');
    $routes->get('/employees/create', 'Employee::create');
    $routes->post('/employees/store', 'Employee::store');

    $routes->get('/employees/edit/(:num)', 'Employee::edit/$1');
    $routes->post('/employees/update/(:num)', 'Employee::update/$1');

    $routes->get('/employees/delete/(:num)', 'Employee::delete/$1');
});

