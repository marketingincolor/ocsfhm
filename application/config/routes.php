<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "welcome";
$route['default_controller'] = 'page/display/home';
$route['404_override'] = '';

//original auth setup
//$route['auth'] = 'auth';
//$route['auth/index'] = 'auth/index';
//$route['login'] = 'auth/login';
//$route['logout'] = 'auth/logout';

//my custom auth method
$route['admin'] = 'admin';
//$route['auth/index'] = 'auth/index';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
/*$route['login'] = 'access/login';
$route['logout'] = 'access/logout';*/

//$route['(about-us)'] = 'page/display/$1';
$route['(prearrangement)'] = 'page/display/$1';
//$route['(helpful-links)'] = 'page/display/$1';
$route['(contact-us)'] = 'page/display/$1';
$route['(privacy)'] = 'page/display/$1';
$route['(sitemap)'] = 'page/display/$1';
$route['about-us/(:any)'] = 'page/subdisplay/$1';
//$route['helpful-links/(:any)'] = 'page/subdisplay/$1';
$route['(resources)'] = 'page/subdisplay/$1';
$route['(hospitality)'] = 'page/subdisplay/$1';
$route['(floral)'] = 'page/subdisplay/$1';
$route['(memorial-products)'] = 'page/subdisplay/$1';

$route['admindash'] = 'dashboard/admin';
$route['dashboard'] = 'dashboard/index';

/////////////////////////////////////////////
//my custom setup from unicorn01
//$route['login'] = 'user/login';
//$route['logout'] = 'user/logout';
//$route['user/view'] = 'user/view_profile';
//$route['user/edit'] = 'user/edit_profile';
//$route['members'] = 'members';
//$route['admin'] = 'admin';
////////////////////////////////////////////
$route['upload'] = 'upload';

$route['services'] = 'services';
//$route['services/upload'] = 'services/upload';

$route['services/gallery_view/(:num)'] = 'services/gallery_view/$1';
$route['services/gallery_read/(:num)'] = 'services/gallery_read/$1';
$route['services/add/(:any)'] = 'services/add/$1';
$route['services/(:any)'] = 'services/display/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */