<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

//--------------------------------------------
//namespaces
if(!defined('ADMIN_NAMESPACE')) define('ADMIN_NAMESPACE', 'App\Controllers\Admin');
if(!defined('PUBLIC_NAMESPACE')) define('PUBLIC_NAMESPACE', 'App\Controllers\PublicSection');

//




//------------------------------
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/prueba', 'PruebaController::index');

$routes->group('',function($routes){
    $routes->get('/', 'Home::index');
    $routes->get('/login', 'LoginController::login',['as'=>'login','namespace' => PUBLIC_NAMESPACE] );
    $routes->get('/home', 'HomeController::home',['as'=>'home','namespace' => PUBLIC_NAMESPACE] );
});
$routes->group('/admin',function($routes){
    $routes->get('home_admin', 'HomeAdminController::home_admin',['as'=>'home_admin','namespace' => ADMIN_NAMESPACE] );
});

//$routes->get('/', 'Home::index');

$routes->get('/prueba/(:any)', 'PruebaController::index/$1');
$routes->get('/contacto', 'ContactoController::index');
$routes->get('/documentation', 'Docs::docs',['as'=>'docs'] );
//$routes->get('/login', 'LoginController::login',['as'=>'login','namespace' => PUBLIC_NAMESPACE] );
//$routes->get('/home', 'HomeController::home',['as'=>'home','namespace' => PUBLIC_NAMESPACE] );
$routes->get('/home_admin', 'HomeAdminController::home_admin',['as'=>'home_admin','namespace' => ADMIN_NAMESPACE] );

// Ejemplo de Agrupacion de routes//

/*
$routes->group('productos' function($routes){
    $routes->get('/productos','productos::showList');
    $routes->delete('/productos','productos::delete/$1');

});
*/

/*
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
