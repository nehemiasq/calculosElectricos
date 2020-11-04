<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('controllerLogin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index'); //manda al inicio del sistema

//API Login
$routes->post('usuariologin', 'controllerServiceLogin::crearUsuario'); 

//Aquí se ponen todos los servicios que se crean
$routes->get('listaproyectos', 'controllerServicePrincipal::pruebaGet');
$routes->post('nuevoproyecto', 'controllerServicePrincipal::insertarProyecto'); 
$routes->post('eliminarproyecto', 'controllerServicePrincipal::eliminarProyecto'); 
$routes->post('estadoproyecto', 'controllerServicePrincipal::estadoProyecto');
$routes->post('incrementarproyecto', 'controllerServicePrincipal::incrementarProyecto'); 

//uno es el nombre de servicio y el otro el controlador de servicio

$routes->get('listapostes', 'controllerServiceMantPoste::Get');
$routes->post('posteid', 'controllerServiceMantPoste::GetId');
$routes->post('nuevoposte', 'controllerServiceMantPoste::insertarPoste');
$routes->post('actualizarposte', 'controllerServiceMantPoste::ping');
$routes->post('eliminarposte', 'controllerServiceMantPoste::eliminarPoste');
$routes->post('aumentarid', 'controllerServiceMantPoste::aumentarId');

//uno es el nombre de servicio y el otro el controlador de servicio
$routes->get('listacables', 'controllerServiceMantCable::Get');
$routes->post('cableid', 'controllerServiceMantCable::GetId');
$routes->post('nuevocable', 'controllerServiceMantCable::insertarCable');
$routes->post('actualizarcable', 'controllerServiceMantCable::ping');
$routes->post('eliminarcable', 'controllerServiceMantCable::eliminarCable');
$routes->post('incrementarid', 'controllerServiceMantCable::incrementarId');

//uno es el nombre de servicio y el otro el controlador (funcion creada) de servicio


//uno es el nombre de servicio y el otro el controlador (funcion creada) de servicio

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
