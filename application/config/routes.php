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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

function validateModule($module)
{
  if( $module != '.' &&
  $module != '..' &&
  $module != '.svn' &&
  substr($module,0,1) != '_' &&
  substr($module,0,1) != '#' ){
    return true;
  }
  return false;
}

$modules_path = APPPATH . 'modules/';
foreach (scandir($modules_path) as $module) {
    if ( validateModule($module) && is_dir($modules_path . $module) ) {
      $controllers_paths = $modules_path . $module . '/controllers/';
      $config_paths = $modules_path . $module . '/config/';

      // Meerge all modules routes
      // foreach (scandir($config_paths) as $config_file) {
        if ( is_file($config_paths . 'routes.php') ) {
          $module_route = include $config_paths . 'routes.php';
          $route = array_merge($route, $module_route);
        }
      // }

      // Create default routes
      foreach (scandir($controllers_paths) as $controller_file) {
          if ( is_file($controllers_paths . $controller_file) ) {
              $controller = preg_replace('/\\.[^.\\s]{3,4}$/', '', $controller_file);
              if($controller == 'home'){
                  $route[$controller] = $route['default_controller'];
                  $route[$controller . '/(:any)'] = $route['default_controller'] . "/$1";
                  $route[$controller . '/(:any)/(:any)'] = $route['default_controller'] . "/$1/$2";
                  $route[$controller . '/(:any)/(:any)/(:any)'] = $route['default_controller'] . "/$1/$2/$3";
              }else{
                  $route[$controller] = $module . "/" . $controller;
                  $route[$controller . '/(:any)'] = $module . "/" . $controller . "/$1";
                  $route[$controller . '/(:any)/(:any)'] = $module . "/$1/$2";
                  $route[$controller . '/(:any)/(:any)/(:any)'] = $module . "/$1/$2/$3";
              }
          }
      }
    }
}
