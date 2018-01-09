<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['checkout'] = 'checkout/index';
//$route['product'] = 'product/index';
//$route['autologin'] = 'login/autologin';
$route['login'] = 'login/index';
$route['editar'] = 'login/editar';
$route['edit'] = 'login/edit';
$route['update_table'] = 'login/update_table';
$route['add_modelo'] = 'login/add_modelo';
$route['nuevo_modelo'] = 'login/nuevo_modelo';
$route['add_motivo'] = 'login/add_motivo';
$route['nuevo_motivo'] = 'login/nuevo_motivo';
$route['add_marca'] = 'login/add_marca';
$route['nueva_marca'] = 'login/nueva_marca';
$route['add_dispositivo'] = 'login/add_dispositivo';
$route['nuevo_dispositivo'] = 'login/nuevo_dispositivo';
$route['add_incidencia'] = 'login/add_incidencia';
$route['nueva_incidencia'] = 'login/nueva_incidencia';
$route['posiciones/(:any)'] = 'login/posiciones/$1';
$route['graficos/(:any)'] = 'login/configurar/$1';
$route['lista_incidencias/(:any)/(:any)/(:any)'] = 'login/lista_incidencias/$1/$2/$3';
$route['incidencias_area/(:any)/(:any)/(:any)'] = 'login/incidencias_area/$1/$2/$3';
$route['incidencias_motivos/(:any)/(:any)/(:any)'] = 'login/motivos_incidencias/$1/$2/$3';
$route['incidencia_area_mes/(:any)/(:any)/(:any)'] = 'login/incidencia_area_mes/$1/$2/$3';

$route['loginparams'] = 'login/loginparams';
$route['dashboard'] = 'login/dashboard';
$route['logout'] = 'login/logout';
$route['iniciar_sesion'] = 'usuarios/iniciar_sesion';
$route['logueado'] = 'usuarios/logueado';
//$route['login/(:any)/(:any)'] = 'login/index/$1/$2';
$route['default_controller'] = 'login';
$route['product'] = 'product';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;
