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




$route['default_controller'] = "default/home";
$route['login'] = 'backend/verify/login';
$route['news'] = 'default/news/index';
$route['lien-he'] = 'default/home/contact';
//$route['news/(:any)'] = 'default/news/$1';
$route['news/(:num)'] = 'default/news/index/$1';
$route['c(:num)-(:any).htm'] = 'default/news/category/$1';
$route['tim-kiem.htm'] = 'default/product/search';
//$route['news/(:any)/(:num)'] = 'default/news/$1/$2';


$route['n(:num)-(:any).htm'] = 'default/news/detail/$1';
$route['san-pham/danh-muc/(:num)'] = 'default/product/category/$1';
$route['san-pham/danh-muc/(:num)/(:num)'] = 'default/product/category/$1/$2';
$route['san-pham/danh-muc/(:num)-(:any).htm'] = 'default/product/category/$1';
$route['san-pham/danh-muc/(:num)-(:any).htm/(:num)'] = 'default/product/category/$1/$2';
$route['san-pham/(:num)-(:any).htm'] = 'default/product/detail/$1';
$route['san-pham/tim-kiem.html'] = 'default/product/search';
$route['product'] = 'default/product/index';
$route['san-pham'] = 'default/product/index';
$route['product/addCart'] = 'default/product/addCart';
$route['product/showCart'] = 'default/product/showCart';
$route['product/update'] = 'default/product/update';
$route['product/del/(:num)'] = 'default/product/del/$1';
$route['product/checkout'] = 'default/product/checkout';
$route['product/success'] = 'default/product/success';


$route['pages/(:num)-(:any).html'] = 'default/home/pages/$1';


// ABOUT US
$route['about'] = 'default/about';
$route['about/leadership'] = 'default/about/leadership';
$route['about/board'] = 'default/about/board';
$route['about/advisors'] = 'default/about/advisors';
$route['about/press'] = 'default/about/press';
$route['about/news'] = 'default/about/news';
$route['about/partnerships'] = 'default/about/partnerships';
$route['about/contact'] = 'default/about/contact';

// BLOG
$route['blog'] = 'default/blog/index';
$route['blog/(:any)/(:any).html'] = 'default/blog/index/$1/$2';
$route['blog/(:any).html'] = 'default/blog/detail/$1';




//$route['students/detail/(:num)-(:any).html'] = 'default/students/detail/$1';
$route['404_override'] = '';

// admin
//$route['backend/verify/login'] = 'login';

/* End of file routes.php */
/* Location: ./application/config/routes.php */