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
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

//--------------------------------------------
//namespaces
if(!defined('ADMIN_NAMESPACE')) define('ADMIN_NAMESPACE', 'App\Controllers\Admin');
if(!defined('PUBLIC_NAMESPACE')) define('PUBLIC_NAMESPACE', 'App\Controllers\PublicSection');
//if(!defined('AJAX_NAMESPACE')) define('AJAX_NAMESPACE', 'App\Controllers\TestAjaxController');
if(!defined('REST_NAMESPACE')) define('REST_NAMESPACE', 'App\Controllers\Rest');
if(!defined('COMMAND_NAMESPACE')) define('COMMAND_NAMESPACE', 'App\Controllers\Command');
// --------------------------------------------------------------------
// Routes 
// --------------------------------------------------------------------
//--------------------------------------------------------------------
// Public Routes
//-------------------------------------------------------------------
$routes->group('',function($routes){
    $routes->get('/', 'LoginController::index',['as'=>'index', 'filter'=>'auth', 'namespace' => PUBLIC_NAMESPACE] ); //'filter'=>'auth_public',
    $routes->get('/logout', 'LogoutController::logout',['as'=>'logout','namespace' => PUBLIC_NAMESPACE] );
    $routes->post('/login', 'LoginController::login',['as'=>'login','namespace' => PUBLIC_NAMESPACE] );
    //$routes->get('/login', 'LoginController::login',['as'=>'login','namespace' => PUBLIC_NAMESPACE] );
    $routes->get('/home', 'HomeController::home',['as'=>'home','filter'=>'auth_public','namespace' => PUBLIC_NAMESPACE] );  //'filter'=>'auth',   , 'filter'=>'auth_public'
});
//--------------------------------------------------------------------
// Admin Routes
//-------------------------------------------------------------------
$routes->group('/admin',function($routes){
    $routes->get('home_admin', 'HomeAdminController::home_admin',['as'=>'home_admin','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 
    $routes->get('new', 'HomeAdminController::new',['as'=>'new','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 
    $routes->get('users_admin', 'UsersController::index',['as'=>'users_admin','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 
    $routes->get('roles_admin', 'RolesController::index',['as'=>'roles_admin','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 
    $routes->get('festivals_admin', 'FestivalsController::index',['as'=>'festivals_admin','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 
    $routes->get('festivals_admin_edit', 'FestivalsController::edit',['as'=>'festivals_admin_edit','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 
    $routes->get('categories_admin', 'CategoriesController::index',['as'=>'categories_admin','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 
    $routes->get('config_admin', 'ConfigController::index',['as'=>'config_admin','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //'filter'=>'auth_private', 

    //DataTable Festivals
    $routes->post('festivals_data', 'FestivalsController::getFestivalsData',['as'=>'festivals_data','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //Get Data
    $routes->delete('festivals_delete', 'FestivalsController::delete',['as'=>'festivals_delete','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //Delete data 
    $routes->get('festivals_add', 'FestivalsController::addFestival',['as'=>'festivals_add','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] ); //Add data 
    $routes->get('festivals_add/(:any)', 'FestivalsController::addFestival/$1',['filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //Edit Data 
    $routes->post('save_festival', 'FestivalsController::saveNewFestival',['as'=>'save_festival','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] ); //Add data 

    //DataTable Categories
    $routes->post('categories_data', 'CategoriesController::getData',['as'=>'categories_data','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] );  //Get Data
    //DataTable Users
    $routes->post('users_data', 'UsersController::getUsersData',['as'=>'users_data','filter'=>'auth_private','namespace' => ADMIN_NAMESPACE] ); //Get Data
    
});





//--------------------------------------------------------------------
// Rest Routes
//-------------------------------------------------------------------
$routes->group('rest',function($routes){
    $routes->get('categories', 'CategoriesController::index',['namespace' => REST_NAMESPACE] ); 
    $routes->get('categories/(:any)', 'CategoriesController::index/$1',['namespace' => REST_NAMESPACE] ); 
    $routes->delete('categories', 'CategoriesController::deleteCategory',['namespace' => REST_NAMESPACE] ); 
    //$routes->delete('categories', 'CategoriesController::deleteCategory',['namespace' => REST_NAMESPACE] ); 
    $routes->post('categories', 'CategoriesController::modify',['namespace' => REST_NAMESPACE] ); 
    //$routes->post('categories', 'CategoriesController::modifyCategory',['namespace' => REST_NAMESPACE] ); CRear o modificar
});
//--------------------------------------------------------------------
// Command Routes
//-------------------------------------------------------------------
$routes->group('commands',function($routes){
    $routes->cli('comandouno', 'Scripts::comandoUno',['namespace' => COMMAND_NAMESPACE] ); 
    $routes->cli('comandodos', 'Scripts::comandoDos',['namespace' => COMMAND_NAMESPACE] ); 
    $routes->cli('comandotres', 'Scripts::comandoTres',['namespace' => COMMAND_NAMESPACE] ); 
});
//--------------------------------------------------------------------





//---------$routes->get('/', 'Home::index');
$routes->get('/prueba/(:any)', 'PruebaController::index/$1');
$routes->get('/home_admin', 'HomeAdminController::home_admin',['as'=>'home_admin', 'filter' =>'private_auth','namespace' => ADMIN_NAMESPACE] );
//-------------------------------------------------------------------
//--Route testAjax
//--------------------------------------------------------------------
$routes->group('/ajax',function($routes){
    //$routes->get('/documentacion/ajax', "Home::testAjax", ['as' => 'test_ajax', 'namespace' => AJAX_NAMESPACE]);
    //$routes->post('/documentacion/ajax', "Home::testAjax", ['as' => 'test_ajax', 'namespace' => AJAX_NAMESPACE]);
});


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
















//
// Ejemplo de Agrupacion de routes//
//$routes->get('/prueba', 'PruebaController::index');

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

