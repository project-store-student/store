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
$route['default_controller'] = 'my_customer';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['product'] = "my_customer";
//http://store.com/my_customer/show_list_cart
$route['product/list-cart'] = "my_customer/show_list_cart";
$route['product/login'] = "my_customer/view_login";
//http://store.com/my_customer/customer_edit_profile
$route['customer/profile'] = "my_customer/customer_edit_profile";

//http://store.com/my_customer/index/1/all/1/1
//$route['subjects/(:num)/(:any)'] = 'subjects/view/$1/$2';

$route['product/(:any)/(:any)/(:any)/(:num)'] = "my_customer/index/$1/$2/$3/$4";


//$route['product/([a-z]+)/(\d+)'] = "my_customer/index";

