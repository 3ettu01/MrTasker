<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Controlador::index');

// $routes->get('/Tareas', 'Controlador::get_index'); // descartado
$routes->get('/Crear', 'Controlador::get_crear_tarea');
$routes->get('/Perfil', 'Controlador::get_perfil');
$routes->get('/Archivo', 'Controlador::get_archivo');
$routes->get('/Cerrar', 'Controlador::cerrar_sesion');

$routes->get('/tareas/ver/(:num)', 'Controlador::ver/$1');
$routes->get('/tareas/estado/(:alpha)', 'Controlador::index/$1');
$routes->get('/tareas/ordenar/(:alpha)/(:alpha)', 'Controlador::ordenar/$1/$2');
$routes->get('/tareas/archivar/(:num)', 'Controlador::archivar/$1');

// formularios
$routes->post('form/login', 'Controlador::login');
$routes->post('form/registro', 'Controlador::registro');
$routes->post('form/creart', 'Controlador::tarea');
$routes->post('form/crearsubt/(:num)', 'Controlador::subtarea/$1');
$routes->post('form/editperfil', 'Controlador::editperfil');
$routes->post('tareas/actestado/(:num)', 'Controlador::actestado/$1');