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
$routes->get('/tareas/editar/(:num)', 'Controlador::get_edittarea/$1');
$routes->get('/tareas/estado/(:alpha)', 'Controlador::index/$1');
$routes->get('/tareas/ordenar/(:alpha)/(:alpha)', 'Controlador::ordenar/$1/$2');
$routes->get('/tareas/archivar/(:num)', 'Controlador::archivar/$1');

$routes->get('/tareas/eliminar/(:num)', 'Controlador::deltarea/$1');
$routes->get('/subt/eliminar/(:num)/(:num)', 'Controlador::delsubtarea/$1/$2');

$routes->get('colaboraciones/aceptar/(:num)/(:num)/(:num)/(:alpha)', 'Controlador::aceptar_colaboracion/$1/$2/$3/$4');

// formularios
$routes->post('form/login', 'Controlador::login');
$routes->post('form/registro', 'Controlador::registro');
$routes->post('form/creart', 'Controlador::tarea');
$routes->post('form/crearsubt/(:num)', 'Controlador::subtarea/$1');
$routes->post('form/editperfil', 'Controlador::editperfil');
$routes->post('form/edittarea/(:num)', 'Controlador::edittarea/$1');
$routes->post('form/editsubt/(:num)/(:num)', 'Controlador::editsubtarea/$1/$2');
$routes->post('tareas/actestado/(:num)', 'Controlador::actestado/$1');
$routes->post('form/addcoop', 'Controlador::invitar_colaborador');