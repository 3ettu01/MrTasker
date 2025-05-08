<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Controlador::index');

$routes->get('/Tareas', 'Controlador::get_index');
$routes->get('/Crear', 'Controlador::get_crear_tarea');
$routes->get('/Perfil', 'Controlador::get_perfil');
$routes->get('/Cerrar', 'Controlador::cerrar_sesion');
$routes->get('/tareas/ver/(:num)', 'Controlador::ver/$1');

// los formularios se hacen por post
$routes->post('form/login', 'Controlador::login');
$routes->post('form/registro', 'Controlador::registro');
$routes->post('form/creart', 'Controlador::tarea');
$routes->post('form/crearsubt/(:num)', 'Controlador::subtarea/$1');
