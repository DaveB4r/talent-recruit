<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// talents
$routes->get('/talents', 'Users::index');
$routes->get('/talents_register', 'Users::register');
$routes->get('/talents_login', 'Users::login');
$routes->get('/talents_logout', 'Users::logout');
$routes->get('/talents_profile', 'Users::profile');
$routes->post('/talents_login', 'Users::session');
$routes->post('/talents', 'Users::save');
$routes->post('/talents_update', 'Users::update');
// recruiters
$routes->get('/recruiters', 'Recruiters::index');
$routes->get('/recruiters_register', 'Recruiters::register');
$routes->get('/recruiters_login', 'Recruiters::login');
$routes->get('/recruiters_logout', 'Recruiters::logout');
$routes->get('/recruiters_profile', 'Recruiters::profile');
$routes->post('/recruiters_login', 'Recruiters::session');
$routes->post('/recruiters', 'Recruiters::save');
$routes->post('/recruiters_update', 'Recruiters::update');
$routes->get('/add_oferta', 'Recruiters::oferta');
$routes->post('/save_oferta', 'Recruiters::saveOferta');
$routes->get('/editar_oferta/(:num)', 'Recruiters::editarOferta/$1');
$routes->post('/update_oferta', 'Recruiters::updateOferta');
$routes->get('/eliminar_oferta/(:num)', 'Recruiters::eliminarOferta/$1');
